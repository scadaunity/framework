<template>
    <div>

        <div v-if="$page.props.money.category.length > 0">
            <jet-section-border />

            <!-- Manage Categorys -->
            <div class="mt-10 sm:mt-0">
                <jet-action-section>
                    <template #title>
                        Gerenciar Categorias <span class="inline-flex items-center justify-center px-2 py-1 ml-2 text-sm font-bold leading-none text-gray-600 bg-blue-200 rounded-full">{{$page.props.money.category.length}}</span>
                    </template>

                    <template #description>
                        Gerencie suas categorias de forma facil e descomplicada.
                    </template>

                    <!-- Categories List -->
                    <template #content>
                        <div class="space-y-4">
                            <div class="" v-for="category in $page.props.money.category" :key="category.id" >
                              <!-- Categories -->
                              <div class="flex items-center justify-between border-t">
                                <span class="flex items-center">
                                  <div class="w-4 h-4 sm:w-8 sm:h-8 rounded-full" :class="category.color"></div>
                                    <span class="text-xs sm:text-sm ml-3 block truncate">{{ category.name }}</span>
                                </span>

                                <div class="flex items-center">
                                    <!-- Category balance -->
                                    <div class="text-xs sm:text-sm text-gray-400">R$ 00.00</div>
                                    <!-- Edit button -->
                                    <button class=" cursor-pointer ml-6 text-gray-400" @click="manageCategory(category)">
                                        <PencilIcon class="h-5 w-5" aria-hidden="true" />
                                    </button>
                                    <!-- Delete button -->
                                    <button class="cursor-pointer ml-6 text-sm text-red-500" @click="confirmCategoryDeletion(category)">
                                        <TrashIcon class="h-5 w-5" aria-hidden="true" />
                                    </button>
                                </div>
                              </div>
                              <!-- subcategories -->
                              <div class="flex items-center justify-between ml-8 space-y-4" v-for="subcategory in category.subcategories" :key="subcategory.id">
                                <span class="flex items-center">
                                  <div class="w-3 h-3 sm:w-6 sm:h-6 rounded-full" :class="subcategory.color"></div>
                                    <span class="text-xs sm:text-sm ml-3 block truncate">{{ subcategory.name }}</span>
                                </span>

                                <div class="flex items-center">
                                    <!-- Category balance -->
                                    <div class="text-xs sm:text-sm text-gray-400">R$ 00.00</div>
                                    <!-- Edit button -->
                                    <button class=" cursor-pointer ml-6 text-gray-400" @click="manageCategory(subcategory)">
                                        <PencilIcon class="h-5 w-5" aria-hidden="true" />
                                    </button>
                                    <!-- Delete button -->
                                    <button class="cursor-pointer ml-6 text-sm text-red-500" @click="confirmCategoryDeletion(subcategory)">
                                        <TrashIcon class="h-5 w-5" aria-hidden="true" />
                                    </button>
                                </div>
                              </div>

                            </div>
                        </div>
                    </template>
                </jet-action-section>
            </div>
        </div>

        <!-- Edit category modal -->
        <jet-dialog-modal :show="manageCategoryFor" @close="manageCategoryFor = null">
            <template #title>
                Editar categoria
            </template>

            <template #content>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div class="col-span-6 sm:col-span-3">
                      <jet-label for="name" value="Nome da categoria:" />
                      <jet-input id="name" type="text" class="mt-1 block w-full" v-model="updateCategoryForm.name" autofocus />
                      <jet-input-error :message="updateCategoryForm.errors.name" class="mt-2" />
                  </div>
                  <!-- Category parent -->
                  <div v-if="$page.props.money.category.length > 0" class="col-span-6 sm:col-span-3">
                      <su-select label='Categoria pai:' :list="$page.props.money.category" v-model="selected_category"/>
                  </div>


                </div>
                <!-- Icon color -->
                <div class="col-span-1 sm:col-span-1 mt-2">
                    <jet-label value="Cor do icone:" class="pb-2" />
                    <su-color-picker @getColor="setUpdateCategoryColor($event)"/>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click="manageCategoryFor = null">
                    Cancel
                </jet-secondary-button>

                <jet-button class="ml-2" @click="updateCategory" :class="{ 'opacity-25': updateCategoryForm.processing }" :disabled="updateCategoryForm.processing">
                    Save
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Delete Token Confirmation Modal -->
        <jet-confirmation-modal :show="categoryBeingDeleted" @close="categoryBeingDeleted = null">
            <template #title>
                Excluir categoria
            </template>

            <template #content>
                Tem certeza que quer excluir esta categoria?
            </template>

            <template #footer>
                <jet-secondary-button @click="categoryBeingDeleted = null">
                    Cancelar
                </jet-secondary-button>

                <jet-danger-button class="ml-2" @click="deleteCategory" :class="{ 'opacity-25': deleteCategoryForm.processing }" :disabled="deleteCategoryForm.processing">
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
    import SuColorPicker from '@/Money/Components/ColorPicker'
    import SuSelect from '@/Money/Components/Select'

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
            SuColorPicker,
            SuSelect
        },

        props: [
            'tokens',
            'availablePermissions',
            'defaultPermissions',
        ],

        data() {
            return {
                createCategoryForm: this.$inertia.form({
                    name: '',
                    opening_balance:'',
                }),

                updateCategoryForm: this.$inertia.form({
                  id:'',
                  name: '',
                  color:'',
                  opening_balance:'',
                }),

                deleteCategoryForm: this.$inertia.form(),

                displayingToken: false,
                manageCategoryFor: null,
                categoryBeingDeleted: null,
                selected_update_category:null
            }
        },

        methods: {
            createCategory() {
                this.createCategoryForm.post(route('money.category.store'), {
                    preserveScroll: false
                    ,
                    onSuccess: () => {
                        this.createCategoryForm.reset()
                    }
                })
            },

            manageCategory(category) {
                this.updateCategoryForm.id = category.id,
                this.updateCategoryForm.name = category.name,
                this.updateCategoryForm.opening_balance = category.opening_balance
                this.updateCategoryForm.color = category.color
                this.manageCategoryFor = category
            },

            updateCategory() {
                this.updateCategoryForm.put(route('money.category.update', this.manageCategoryFor), {
                    preserveScroll: true,
                    preserveState: true,
                    onSuccess: () => (this.manageCategoryFor = null),
                })
            },

            confirmCategoryDeletion(category) {
                this.categoryBeingDeleted = category
            },

            deleteCategory() {
                this.deleteCategoryForm.delete(route('money.category.destroy', this.categoryBeingDeleted), {
                    preserveScroll: true,
                    preserveState: true,
                    onSuccess: () => (this.categoryBeingDeleted = null),
                })
            },
            setUpdateCategoryColor(color){
              this.updateCategoryForm.color = color
            }
        },
    }
</script>
