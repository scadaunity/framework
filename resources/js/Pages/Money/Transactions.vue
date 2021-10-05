<template>
    <app-layout>
        <template #header>
          <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Transações
            </h2>
            <add-button v-if="!showAddForm" @click="showAddForm = true"/>
          </div>

        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <transaction-form-create v-if="showAddForm" class="pb-10"/>

                <transaction-manager/>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Money/AppLayout'
    import TransactionFormCreate from './TransactionFormCreate'
    import TransactionManager from './TransactionManager'
    import AddButton from '@/Money/Components/AddButton'

    export default {
        components: {
            AppLayout,
            TransactionFormCreate,
            TransactionManager,
            AddButton
        },
        data() {
            return {
                showAddForm: false
            }
        },
    }
</script>
