<template>
    <div class="m-y-auto justify-center min-h-screen bg-gray-200 dark:bg-gray-900 sm:items-center sm:pt-0">
      <div class="bg-gradient-to-br from-indigo-900 to-green-900 min-h-screen overflow-auto">

        <!-- Begin Navigation -->
        <nav v-if="canLogin" class="fixed top-0 right-0 px-6 py-4 sm:block bg-gray-900 w-full text-right opacity-50">
            <inertia-link v-if="$page.props.user" href="/dashboard" class="text-sm text-gray-600 ">
                Home
            </inertia-link>

            <template v-else>
                <inertia-link :href="route('login')" class="text-sm text-white">
                    Login
                </inertia-link>

                <inertia-link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-500 hover:text-red-900">
                    Comece já
                </inertia-link>
            </template>
        </nav>
        <!-- End Navigation -->

        <div class="container max-w-5xl mx-auto px-4">
            <div class="w-4/5">
              <h1 class="mt-32 text-white text-6xl font-bold">Scada unity, Plataforma open source de apps <br /><span class="text-blue-400">Comece já, é gratis.</span></h1>
            </div>
            <div class="w-5/6 my-10 ml-6">
              <h3 class="text-gray-300">
                Aqui voce encontra aplicativos totalmente gratuitos para usar <br />
                <strong class="text-white">sem anuncios, sem burocracia</strong>
                <br />Acesse de qualquer lugar...
              </h3>
            </div>
            <div class="hidden sm:block opacity-50 z-0">
              <div class="shadow-2xl w-96 h-96 rounded-full -mt-72"></div>
              <div class="shadow-2xl w-96 h-96 rounded-full -mt-96"></div>
              <div class="shadow-xl w-80 h-80 rounded-full ml-8 -mt-96"></div>
            </div>
            <div class="text-white relative">
              <h3 class="font-semibold">Apps</h3>
              <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 sm:gap-5">


                <inertia-link :href="route('money')">
                  <div class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition">
                      <jet-application-mark class="block h-11 w-auto" />
                      <div>
                        <span class="uppercase">Money</span>
                        <span class="text-xs text-blue-300 block">Controle financeiro</span>
                      </div>

                  </div>
                </inertia-link>




              </div>
            </div>
          </div>




      </div>
    </div>
</template>

<style scoped>
    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }

    .text-gray-500 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }

    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }

    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    export default {
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        },
        components: {
            JetApplicationMark,
        },
    }
</script>
