<template>
    <div>
        <!-- Create account form -->
        <jet-form-section @submitted="createAccount">
            <template #title>
                Criar nova conta
            </template>

            <template #description>
                Criar uma nova conta, te possibilita saber onde você guarda seu dinheiro.
            </template>

            <template #form>
                <!-- Account Name -->
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="name" value="Nome da conta:" />
                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="createAccountForm.name" autofocus />
                    <jet-input-error :message="createAccountForm.errors.name" class="mt-2" />
                </div>
                <!-- Account Balance -->
                <div class="col-span-3 sm:col-span-2">
                    <jet-label for="opening_balance" value="Saldo inicial:" />
                    <jet-input id="opening_balance" type="text" class="mt-1 block w-full" v-model="createAccountForm.opening_balance"/>
                    <jet-input-error :message="createAccountForm.errors.opening_balance" class="mt-2" />
                </div>
            </template>

            <template #actions>
                <jet-action-message :on="createAccountForm.recentlySuccessful" class="mr-3">
                    Conta criada.
                </jet-action-message>

                <jet-button :class="{ 'opacity-25': createAccountForm.processing }" :disabled="createAccountForm.processing">
                    Criar conta
                </jet-button>
            </template>
        </jet-form-section>

    </div>
</template>

<script>
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },

        data() {
            return {
                createAccountForm: this.$inertia.form({
                    name: '',
                    opening_balance:'',
                }),
            }
        },

        methods: {
            createAccount() {
                this.createAccountForm.post(route('money.account.store'), {
                    preserveScroll: false,
                    onSuccess: () => {
                        this.createAccountForm.reset()
                    }
                })
            },
        },
    }
</script>
