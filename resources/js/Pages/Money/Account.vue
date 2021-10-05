<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contas
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <account-form-create/>
                <account-manager/>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Money/AppLayout'
    import AccountManager from './AccountManager'
    import AccountFormCreate from './AccountFormCreate'

    export default {
        props: [
          'tokens',
          'availablePermissions',
          'defaultPermissions',
        ],
        data() {
          return {
              account: this.$page.props.money.account,
          }
        },
        components: {
            AppLayout,
            AccountManager,
            AccountFormCreate
        },
    }
</script>
