<nav class="z-50 bg-white dark:bg-gray-900 relative flex justify-between items-center w-full md:justify-start md:space-x-10 shadow-md py-4 pr-4 pl-4 dark:shadow-blue-500/20">

        <!-- Navbar brand -->
        <a href="<?php route('/') ?>" class="flex items-center">
            <?php component('ApplicationMark') ?>
            <p class="text-xl text-gray-500 dark:text-white ">Scada<strong>Unity</strong></p>
        </a>
        <ul class="hidden flex items-center justify-content-center mx-auto pl-20">
          <li><a href="<?php route('/account') ?>" class="block text-sm px-2 py-4">Contas</a></li>
          <li><a href="#" class="block text-sm px-2 py-4 transition duration-300">Services</a></li>
          <li><a href="#" class="block text-sm px-2 py-4 transition duration-300">About</a></li>
          <li><a href="#" class="block text-sm px-2 py-4 transition duration-300">Contact Us</a></li>
        </ul>


        <!-- Mobile menu button -->
        <div class="md:hidden">
            <button type="button" class="shadown-lg text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300 rounded p-2 focus:ring-2 mobile-menu-button" aria-expanded="false">
                <span class="sr-only">Open menu</span>
                <!-- Heroicon name: outline/menu -->
                <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Right Navbar items -->
        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0 md:space-x-3 ">
          <?php component('ThemeToggle') ?>
          <?php if(user()) : ?>
            <?php component('DropdownNotification') ?>
            <?php component('DropdownUserAccount') ?>
          <?php else : ?>
            <a href="<?php route('/login') ?>" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700 rounded-lg p-2.5">Entrar</a>
            <a href="<?php route('/register') ?>" class="whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Inscrever-se</a>
          <?php endif; ?>
        </div>
</nav>

<div class="hidden dark:bg-gray-900 dark:border rounded-md shadow-md mobile-menu transition duration-300 w-full h-screen">
  <ul class="px-2">
    <li><a href="<?php route('/home') ?>" class="block text-sm px-2 py-4 transition duration-300">Inicio</a></li>
    <li><a href="<?php route('/account') ?>" class="block text-sm px-2 py-4">Contas</a></li>
    <li class="border-t">
        <div class="flex justify-between items-center w-full px-4">
            <a href="<?php route('/login') ?>" class="block text-sm px-6 py-2 m-2 rounded border">Entrar</a>
            <a href="<?php route('/logout') ?>" class="block text-sm px-8 py-2 m-2 rounded border bg-indigo-600 text-gray-200">Sair</a>
        </div>
    </li>
  </ul>
</div>


<script>
	// Grab HTML Elements
	const btn = document.querySelector("button.mobile-menu-button");
	const menu = document.querySelector(".mobile-menu");

	// Add Event Listeners
	btn.addEventListener("click", () => {
	menu.classList.toggle("hidden");
	});
</script>
