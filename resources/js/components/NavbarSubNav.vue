<template>
    <header class="bg-white shadow dark:bg-gray-900 select-none">
        <!-- Navigation start -->
        <nav class="container mx-auto px-6 py-3">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">

                        <a class="flex items-center text-gray-800 text-xl font-bold md:text-2xl hover:text-gray-700" href="/dashboard">
                            <svg class="mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 12H6M12 5l-7 7 7 7"/>
                            </svg>
                            Money
                        </a>

                        <!-- Search input on desktop screen -->
                        <div class="mx-10 hidden md:block">
                          <input type="text" class="w-32 lg:w-64 px-4 py-3 leading-tight text-sm text-gray-700 bg-gray-100 rounded-md placeholder-gray-500 border border-transparent focus:outline-none focus:bg-white focus:shadow-outline focus:border-blue-400" placeholder="Pesquisar" aria-label="Search">
                        </div>
                  </div>

          <!-- Mobile menu button -->
          <div class="flex md:hidden">
            <button @click="isOpen = !isOpen" type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
              <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
              </svg>
            </button>
          </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div class="md:flex items-center" :class="isOpen ? 'block' : 'hidden'">
          <div class="flex flex-col mt-2 md:flex-row md:mt-0 md:mx-1">
            <a class="my-1 text-sm text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="#">Visão Geral</a>
            <a class="my-1 text-sm text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="#">Blog</a>
            <a class="my-1 text-sm text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="#">Compoents</a>
            <a class="my-1 text-sm text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="#">Courses</a>
          </div>

          <div class="flex items-center py-2 -mx-1 md:mx-0">
            <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-blue-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-0 md:w-auto" href="#">Sair</a>
          </div>

          <!-- Search input on mobile screen -->
          <div class="mt-3 md:hidden">
            <input type="text" class="w-full px-4 py-3 leading-tight text-sm text-gray-700 bg-gray-100 rounded-md placeholder-gray-500 focus:outline-none focus:bg-white focus:shadow-outline" placeholder="Pesquisar" aria-label="Search">
          </div>
        </div>
      </div>


    </nav>
    <!-- Navigation end -->
    <div class="mt-3 py-3 -mx-auto overflow-y-auto whitespace-no-wrap scroll-hidden flex">
      <a v-for="month in months" class="text-sm text-gray-700 leading-5 hover:text-green-900 hover:bg-gray-300 mx-1 rounded-full px-5 md:my-0" href="#">{{month}}</a>
    </div>
  </header>

  <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-gray-700 uppercase px-2">Saldo das contas </h2>
        <div class="bg-white rounded-md border bd-gray-200 py-3 px-3 mx-2">
          <p>Entradas</p>
          <p>Saidas</p>
        </div>

      </div>
  </div>

</template>

<script>

    export default {
        components: {

        },

        data() {
            return {
                isOpen: false,
                months:['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            }
        },

        methods: {

        }
    }
</script>

<style>
  .scroll-hidden::-webkit-scrollbar {
    height: 0px;
    background: transparent; /* make scrollbar transparent */
  }
</style>
