<div class="flex items-center justify-center ml-3">
  <div class="relative inline-block text-left dropdown">
    <!-- Button -->
    <span class="rounded-md shadow-sm">
      <button class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5"
       type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
          </svg>
      </button>
    </span>
    <!-- Content -->
    <div class="dropdown-user  invisible transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
      <div class="absolute right-0 w-56 mt-8 origin-top-right bg-white shadow-lg outline-none">
        <!-- User details -->
        <div class="px-4 py-3">
          <p class="text-sm dark:text-black"><?php user('email') ?></p>
        </div>

        <div class="p-2 divide-y divide-slate-100">
            <a href=""                            class="text-gray-700 flex w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-50"  role="menuitem" >Perfil</a>
            <a href="<?php route('/settings') ?>" class="text-gray-700 flex w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-50"  role="menuitem" >Configurações</a>
            <a href="<?php route('/logout') ?>"   class="text-gray-700 flex w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-50"  role="menuitem" >Sair</a></div>
        </div>

    </div>
  </div>
</div>


<style>
.dropdown:focus-within .dropdown-user {
  opacity:1;
  visibility: visible;
}
</style>
