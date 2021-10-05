<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categorias
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <category-form-create/>
                <category-manager/>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Money/AppLayout'
    import CategoryFormCreate from './CategoryFormCreate'
    import CategoryManager from './CategoryManager'

    export default {
        components: {
            AppLayout,
            CategoryFormCreate,
            CategoryManager
        },
    }
</script>
