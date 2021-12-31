<div class="flex items-center justify-center">
  <div class=" relative inline-block text-left dropdown">
    <span class="rounded-md shadow-sm">
      <button class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5"
       type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
          </svg>
      </button>
    </span>
    <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
      <div class="absolute right-0 w-56 mt-5 origin-top-right bg-white dark:bg-gray-900 border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
        <div class="px-4 py-3">
          <p class="text-sm leading-5 dark:text-gray-200"><?php echo user()->name ?></p>
          <p class="text-sm font-medium leading-5 text-gray-900 dark:text-gray-200 truncate"><?php echo user()->email ?></p>
        </div>
        <div class="py-1 border-t">
          <a href="" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Perfil</a>
          <a href="" tabindex="1" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Configurações</a>
        <div class="py-1 border-t hover:bg-gray-100">
          <a href="<?php route('/logout') ?>" tabindex="3" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Sair</a></div>
      </div>
    </div>
  </div>
</div>


<style>
.dropdown:focus-within .dropdown-menu {
  opacity:1;
  transform: translate(0) scale(1);
  visibility: visible;
}
</style>
