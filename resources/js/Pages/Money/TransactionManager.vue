<template>
    <div>

        <div v-if="$page.props.money.transactions.length > 0">

            <!-- Manage Accounts -->
            <div class="mt-10 sm:mt-0">
                <jet-action-section>
                    <template #title>
                        Gerenciar Transações <span class="inline-flex items-center justify-center px-2 py-1 ml-2 text-sm font-bold leading-none text-gray-600 bg-blue-200 rounded-full">{{$page.props.money.transactions.length}}</span>
                    </template>

                    <template #description>
                        Acompanhe os lançamentos.
                    </template>

                    <!-- Accounts List -->
                    <template #content>
                        <div class="space-y-6">
                          <!-- Type -->
                          <div class="col-span-6 sm:col-span-6 flex justify-between">

                            <label class="cursor-pointer">
                              <input type="radio" class="cursor-pointer" value="0" v-model="type"/>
                                Despesa
                            </label>
                            <label class="cursor-pointer">
                              <input type="radio" class="cursor-pointer" value="1" v-model="type"/>
                                Receita
                            </label>

                            <label class="cursor-pointer">
                              <input type="radio" class="cursor-pointer" value="2" v-model="type"/>
                                Transferência
                            </label>

                          </div>
                              <div v-for="date in AvaliableDates" :key="date.id">
                                <span class="text-purple-600">{{formatDate(date)}}</span>

                                <div v-for="transaction in $page.props.money.transactions" :key="transaction.id">
                                    <div class="flex items-center justify-between" v-if="transaction.date == date">
                                        <div class="truncate">
                                            {{ transaction.description }}
                                        </div>

                                        <div class="flex items-center">
                                            <div class="text-sm text-gray-400">
                                                R$ {{ transaction.amount }}
                                            </div>


                                            <button class="cursor-pointer ml-6 text-sm text-gray-400 underline"
                                                @click="manageAccount(transaction)"
                                            >
                                                <PencilIcon class="h-5 w-5" aria-hidden="true" />
                                            </button>

                                            <button class="cursor-pointer ml-6 text-sm text-red-500" @click="confirmAccountDeletion(transaction)">
                                                <TrashIcon class="h-5 w-5" aria-hidden="true" />
                                            </button>
                                        </div>
                                    </div>
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
        <jet-dialog-modal :show="manageTransactionFor" @close="manageTransactionFor = null">
            <template #title>
                Editar transação
            </template>

            <template #content>
              {{updateTransactionForm}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div class="col-span-6 sm:col-span-3">
                      <jet-label for="name" value="Descrição:" />
                      <jet-input id="name" type="text" class="mt-1 block w-full" v-model="updateTransactionForm.description" autofocus />
                      <jet-input-error :message="updateTransactionForm.errors.name" class="mt-2" />
                  </div>
                  <!-- Account Balance -->
                  <div class="col-span-1 sm:col-span-1">
                      <jet-label for="opening_balance" value="Saldo inicial:" />
                      <jet-input id="opening_balance" type="text" class="mt-1 block w-full" v-model="updateTransactionForm.amount"/>
                      <jet-input-error :message="updateTransactionForm.errors.amount" class="mt-2" />
                  </div>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click="manageTransactionFor = null">
                    Cancel
                </jet-secondary-button>

                <jet-button class="ml-2" @click="updateAccount" :class="{ 'opacity-25': updateTransactionForm.processing }" :disabled="updateTransactionForm.processing">
                    Save
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Delete Token Confirmation Modal -->
        <jet-confirmation-modal :show="transactionBeingDeleted" @close="transactionBeingDeleted = null">
            <template #title>
                Excluir transação
            </template>

            <template #content>
                Tem certeza que quer excluir esta transação?
            </template>

            <template #footer>
                <jet-secondary-button @click="transactionBeingDeleted = null">
                    Cancelar
                </jet-secondary-button>

                <jet-danger-button class="ml-2" @click="deleteTransaction" :class="{ 'opacity-25': deleteTransactionForm.processing }" :disabled="deleteTransactionForm.processing">
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

                updateTransactionForm: this.$inertia.form({
                  id:'',
                  description: '',
                  opening_balance:'',
                }),

                deleteTransactionForm: this.$inertia.form(),

                displayingToken: false,
                manageTransactionFor: null,
                transactionBeingDeleted: null,
                type: 0, // receitas, despesas, transações
                AvaliableDates: null, //Armazena data temporaria para acumular nos dias
                filter:{
                  type:0,

                }
            }
        },

        methods: {
            createAccount() {
                this.createAccountForm.post(route('money.transactions.store'), {
                    preserveScroll: false
                    ,
                    onSuccess: () => {
                        this.createAccountForm.reset()
                    }
                })
            },

            manageAccount(transaction) {
                this.updateTransactionForm.id = transaction.id,
                this.updateTransactionForm.description = transaction.description,
                this.updateTransactionForm.amount = transaction.amount
                this.manageTransactionFor = transaction
            },

            updateAccount() {
                this.updateTransactionForm.put(route('money.transactions.update', this.manageTransactionFor), {
                    preserveScroll: true,
                    preserveState: true,
                    onSuccess: () => (this.manageTransactionFor = null),
                })
            },

            confirmAccountDeletion(transaction) {
                this.transactionBeingDeleted = transaction
            },

            deleteTransaction() {
                this.deleteTransactionForm.delete(route('money.transactions.destroy', this.transactionBeingDeleted), {
                    preserveScroll: true,
                    preserveState: true,
                    onSuccess: () => (this.transactionBeingDeleted = null),
                })
            },

            render(){
              this.AvaliableDates = this.getDates()
            },
            getDates(){
              let colections =[]
              this.$page.props.money.transactions.forEach((transaction, i) => {
                if(!colections.includes(transaction.date)){
                  colections.push(transaction.date)
                }
              });
              return colections
            },
            formatDate(date){
              var data = new Date(date);
              return data.toLocaleDateString()
            }
        },
        beforeMount(){
          this.render()
        },
    }
</script>
