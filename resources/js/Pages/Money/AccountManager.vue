<template>
    <div>

        <div v-if="$page.props.money.account.length > 0">
            <jet-section-border />

            <!-- Manage Accounts -->
            <div class="mt-10 sm:mt-0">
                <jet-action-section>
                    <template #title>
                        Gerenciar Contas <span class="inline-flex items-center justify-center px-2 py-1 ml-2 text-sm font-bold leading-none text-gray-600 bg-blue-200 rounded-full">{{$page.props.money.account.length}}</span>
                    </template>

                    <template #description>
                        Gerencie suas contas de forma facil e descomplicada.
                    </template>

                    <!-- Accounts List -->
                    <template #content>
                        <div class="space-y-6">
                            <div class="flex items-center justify-between" v-for="account in $page.props.money.account" :key="account.id">
                                <div>
                                    {{ account.name }}
                                </div>

                                <div class="flex items-center">
                                    <div class="text-sm text-gray-400" v-if="account.opening_balance">
                                        R$ {{ account.opening_balance }}
                                    </div>


                                    <button class="cursor-pointer ml-6 text-sm text-gray-400 underline"
                                        @click="manageAccount(account)"
                                    >
                                        <PencilIcon class="h-5 w-5" aria-hidden="true" />
                                    </button>

                                    <button class="cursor-pointer ml-6 text-sm text-red-500" @click="confirmAccountDeletion(account)">
                                        <TrashIcon class="h-5 w-5" aria-hidden="true" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </jet-action-section>
            </div>
        </div>

        <!-- Token Value Modal -->
        <jet-dialog-modal :show="displayingToken" @close="displayingToken = false">
            <template #title>
                API Token
            </template>

            <template #content>
                <div>
                    Please copy your new API token. For your security, it won't be shown again.
                </div>

                <div class="mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500" v-if="$page.props.jetstream.flash.token">
                    {{ $page.props.jetstream.flash.token }}
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click="displayingToken = false">
                    Close
                </jet-secondary-button>
            </template>
        </jet-dialog-modal>

        <!-- API Token Permissions Modal -->
        <jet-dialog-modal :show="manageAccountFor" @close="manageAccountFor = null">
            <template #title>
                Editar conta
            </template>

            <template #content>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div class="col-span-6 sm:col-span-3">
                      <jet-label for="name" value="Nome da conta:" />
                      <jet-input id="name" type="text" class="mt-1 block w-full" v-model="updateAccountForm.name" autofocus />
                      <jet-input-error :message="updateAccountForm.errors.name" class="mt-2" />
                  </div>
                  <!-- Account Balance -->
                  <div class="col-span-1 sm:col-span-1">
                      <jet-label for="opening_balance" value="Saldo inicial:" />
                      <jet-input id="opening_balance" type="text" class="mt-1 block w-full" v-model="updateAccountForm.opening_balance"/>
                      <jet-input-error :message="updateAccountForm.errors.opening_balance" class="mt-2" />
                  </div>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click="manageAccountFor = null">
                    Cancel
                </jet-secondary-button>

                <jet-button class="ml-2" @click="updateAccount" :class="{ 'opacity-25': updateAccountForm.processing }" :disabled="updateAccountForm.processing">
                    Save
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Delete Token Confirmation Modal -->
        <jet-confirmation-modal :show="accountBeingDeleted" @close="accountBeingDeleted = null">
            <template #title>
                Excluir conta
            </template>

            <template #content>
                Tem certeza que quer excluir esta conta?
            </template>

            <template #footer>
                <jet-secondary-button @click="accountBeingDeleted = null">
                    Cancelar
                </jet-secondary-button>

                <jet-danger-button class="ml-2" @click="deleteAccount" :class="{ 'opacity-25': deleteAccountForm.processing }" :disabled="deleteAccountForm.processing">
                    Excluir
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>
    </div>
</template>

<script>
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetActionSection from '@/Jetstream/ActionSection'
    import JetButton from '@/Jetstream/Button'
    import JetConfirmationModal from '@/Jetstream/ConfirmationModal'
    import JetDangerButton from '@/Jetstream/DangerButton'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import JetSectionBorder from '@/Jetstream/SectionBorder'
    import { PencilIcon, TrashIcon } from '@heroicons/vue/solid'

    export default {
        components: {
            JetActionMessage,
            JetActionSection,
            JetButton,
            JetConfirmationModal,
            JetDangerButton,
            JetDialogModal,
            JetFormSection,
            JetInput,
            JetCheckbox,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            JetSectionBorder,
            PencilIcon,
            TrashIcon,
        },

        props: [
            'tokens',
            'availablePermissions',
            'defaultPermissions',
        ],

        data() {
            return {
                createAccountForm: this.$inertia.form({
                    name: '',
                    opening_balance:'',
                }),

                updateAccountForm: this.$inertia.form({
                  id:'',
                  name: '',
                  opening_balance:'',
                }),

                deleteAccountForm: this.$inertia.form(),

                displayingToken: false,
                manageAccountFor: null,
                accountBeingDeleted: null,
            }
        },

        methods: {
            createAccount() {
                this.createAccountForm.post(route('money.account.store'), {
                    preserveScroll: false
                    ,
                    onSuccess: () => {
                        this.createAccountForm.reset()
                    }
                })
            },

            manageAccount(account) {
                this.updateAccountForm.id = account.id,
                this.updateAccountForm.name = account.name,
                this.updateAccountForm.opening_balance = account.opening_balance
                this.manageAccountFor = account
            },

            updateAccount() {
                this.updateAccountForm.put(route('money.account.update', this.manageAccountFor), {
                    preserveScroll: true,
                    preserveState: true,
                    onSuccess: () => (this.manageAccountFor = null),
                })
            },

            confirmAccountDeletion(account) {
                this.accountBeingDeleted = account
            },

            deleteAccount() {
                this.deleteAccountForm.delete(route('money.account.destroy', this.accountBeingDeleted), {
                    preserveScroll: true,
                    preserveState: true,
                    onSuccess: () => (this.accountBeingDeleted = null),
                })
            },
        },
    }
</script>
