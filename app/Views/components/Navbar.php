<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="relative bg-white dark:bg-gray-900">
  <div class="max-full mx-auto px-4 sm:px-6 border-b-2 border-gray-100 dark:border-gray-600 dark:border-b">
    <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
        <!-- Navbar brand -->
        <a href="<?php route('/') ?>" class="flex items-center text-gray-800 dark:text-gray-200">
            <?php component('ApplicationMark') ?>
            <p class="text-xl ml-2">Scada<strong>Unity</strong></p>
        </a>
        <!-- Navbar Hamburguer button -->
        <div class="-mr-2 -my-2 md:hidden">
            <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                <span class="sr-only">Open menu</span>
                <!-- Heroicon name: outline/menu -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
          <?php component('darkMode') ?>
          <?php if(!user()) : ?>
            <!-- Visitante # Habilita o botao entrar e registrar -->
              <a href="<?php route('/login') ?>" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Entrar</a>
              <a href="<?php route('/register') ?>" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Inscrever-se</a>
          <?php else : ?>
            <!-- Usuario logado # habilita o botão sair-->
              <a href="<?php route('/logout') ?>" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-blue-900">Sair</a>
          <?php endif; ?>
        </div>
    </div>
  </div>
</nav>
