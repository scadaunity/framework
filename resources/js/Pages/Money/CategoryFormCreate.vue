<template>
    <div>
        <!-- Create account form -->
        <jet-form-section @submitted="createCategory">
            <template #title>
                Criar nova Categoria
            </template>

            <template #description>
                Criar uma nova categoria, para agrupar suas receitas e despesas.
            </template>

            <template #form>
                <!-- Category name -->
                <div class="col-span-6 sm:col-span-3">
                    <jet-label for="name" value="Nome da categoria:" />
                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="createCategoryForm.name" autofocus />
                    <jet-input-error :message="createCategoryForm.errors.name" class="mt-2" />
                </div>
                <!-- Category parent -->
                <div v-if="$page.props.money.category.length > 0" class="col-span-6 sm:col-span-3">
                    <su-select label='Categoria pai:' :list="$page.props.money.category" v-model="selected_category"/>
                </div>
                <!-- Icon color -->
                <div class="col-span-6 sm:col-span-6">
                    <jet-label value="Cor do icone:" class="pb-2" />
                    <su-color-picker @getColor="setColor($event)"/>
                </div>
            </template>

            <template #actions>
                <jet-action-message :on="createCategoryForm.recentlySuccessful" class="mr-3">
                    Categoria criada.
                </jet-action-message>

                <jet-button :class="{ 'opacity-25': createCategoryForm.processing }" :disabled="createCategoryForm.processing">
                    Criar categoria
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
    import SuSelect from '@/Money/Components/Select'
    import SuColorPicker from '@/Money/Components/ColorPicker'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            SuSelect,
            SuColorPicker
        },

        data() {
            return {
                createCategoryForm: this.$inertia.form({
                    name: '',
                    parent_id: 0,
                    state:'',
                    type:'',
                    color:'bg-gray-700',
                    icon:'',
                }),
                selected:'',
                selected_category:0,
                colors:['bg-green-300','bg-blue-300','bg-pink-400','bg-gray-400','bg-purple-700','bg-pink-700','bg-red-600','bg-green-700','bg-gray-700','bg-yellow-400','bg-red-900','bg-black'],
            }
        },

        methods: {
            createCategory() {
                this.createCategoryForm.parent_id = this.selected_category.id
                this.createCategoryForm.post(route('money.category.store'), {
                    preserveScroll: false,
                    onSuccess: () => {
                        this.createCategoryForm.reset()
                    }
                })
            },
            toggle(){
              console.log(this.$refs)
            },
            setColor(color){
              this.createCategoryForm.color = color
            }
        },
    }
</script>

<style>
  .icon-color{
    width: 1.25rem;
    height: 1.25rem;
    margin-right: 0.5rem;
    border: none;
  }
  .icon-color:after{
    content:'';
    clear: both;
  }
</style>
