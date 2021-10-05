<template>
    <div>
        <!-- Create account form -->
        <jet-form-section @submitted="createTransaction">
            <template #title>
                Nova transação
            </template>

            <template #description>
                Aqui voçê faz a transações nas suas contas, receitas, despesas e transferencia entre contas.
            </template>

            <template #form>
                <!-- Amount -->
                <div class="col-span-6 sm:col-span-4 px-4 rounded-md text-center sm:col-start-2">
                    <jet-label for="amount" value="Valor:" />
                    <jet-input id="amount" type="number" step="0.01" min="0.01" class="mt-1 block w-full h-20 rounded-full text-4xl text-gray-600 font-black text-center" v-model="createTransactionForm.amount" autofocus/>
                    <jet-input-error :message="createTransactionForm.errors.amount" class="mt-2" />
                </div>

                <!-- Type -->
                <div class="col-span-6 sm:col-span-6 flex justify-between">

                    <label class="cursor-pointer">
                      <input type="radio" class="cursor-pointer" value="0" @click="selected = 'bg-red-600'" v-model="createTransactionForm.type"/>
                        Despesa
                    </label>
                    <label class="cursor-pointer">
                      <input type="radio" class="cursor-pointer" value="1" @click="selected = 'bg-green-600'" v-model="createTransactionForm.type"/>
                        Receita
                    </label>

                    <label class="cursor-pointer">
                      <input type="radio" class="cursor-pointer" value="2" @click="selected = 'bg-blue-600'" v-model="createTransactionForm.type"/>
                        Transferência
                    </label>

                </div>

                <!-- Date -->
                <div class="col-span-6 sm:col-span-3">
                    <jet-label for="date" value="Data:" />
                    <jet-input id="date" type="date" class="mt-1 block w-full" v-model="createTransactionForm.date"  />
                    <jet-input-error :message="createTransactionForm.errors.date" class="mt-2" />
                </div>

                <!-- Account -->
                <div v-if="$page.props.money.account.length > 0" class="col-span-6 sm:col-span-3">
                    <su-select label='Conta:' :list="$page.props.money.account" v-model="account"/>
                    <jet-input-error :message="createTransactionForm.errors.account" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="col-span-6 sm:col-span-6">
                    <jet-label for="description" value="Descrição da transação:" />
                    <jet-input id="description" type="text" class="mt-1 block w-full" v-model="createTransactionForm.description"  />
                    <jet-input-error :message="createTransactionForm.errors.description" class="mt-2" />
                </div>

                <!-- Category -->
                <div v-if="$page.props.money.category.length > 0" class="col-span-6 sm:col-span-3">
                    <su-select label='Categoria:' :list="$page.props.money.category" v-model="category"/>
                    <jet-input-error :message="createTransactionForm.errors.category" class="mt-2" />
                </div>

                <!-- Subcategory -->
                <div v-if="category" class="col-span-6 sm:col-span-3">
                    <su-select label='Subcategoria:' :list="category.subcategories" v-model="subcategory"/>
                    <jet-input-error :message="createTransactionForm.errors.category" class="mt-2" />
                </div>

            </template>

            <template #actions>
                <jet-action-message :on="createTransactionForm.recentlySuccessful" class="mr-3">
                    Salvo.
                </jet-action-message>

                <jet-button :class="{ 'opacity-25': createTransactionForm.processing }" :disabled="createTransactionForm.processing">
                    Salvar
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
    import Tabs from '@/Money/Components/Tabs'
    import SuSelect from '@/Money/Components/Select'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            Tabs,
            SuSelect
        },

        data() {
            return {
                createTransactionForm: this.$inertia.form({
                    amount:'',
                    type:'',
                    description:'',
                    category:'',
                    account:'',
                    date:''

                }),
                selected:'',
                category:null,
                subcategory:null,
                account:''
            }
        },

        methods: {
            createTransaction() {
                if(this.subcategory){
                  this.createTransactionForm.category = this.subcategory.id
                } else{
                  this.createTransactionForm.category = this.category.id
                }

                this.createTransactionForm.account = this.account.id
                this.createTransactionForm.post(route('money.transactions.store'), {
                    preserveScroll: false,
                    onSuccess: () => {
                        this.createTransactionForm.reset()
                    }
                })
            },
        },
    }
</script>

<style>


</style>
