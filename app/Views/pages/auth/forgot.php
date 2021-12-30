<!-- component -->
<div class="w-full flex justify-center items-center h-screen bg-gray-200">
  <div class="max-w-md w-full bg-white p-6 space-y-10 bg-white rounded-xl drop-shadow-2xl">
    <div class="w-full flex justify-center items-center">
        <?php component('ApplicationLogo') ?>
    </div>
    <div class="w-full flex justify-center items-center">
        <h1 class="text-gray-800 font-bold text-2xl mb-1">Recuperação de conta</h1>
    </div>
    <form class="bg-white" method="post" action="<?php route('/password/reset') ?>">
      <?php csrf() ?>
      <div class="w-full flex justify-center items-center">
        <p class="text-sm font-normal text-gray-600 mb-7">Por favor, informe seu email de cadastro.</p>
      </div>


      <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
        </svg>
        <input class="pl-2 outline-none border-none" type="text" name="email" id="" placeholder="Email" />
      </div>

      <div class="w-full flex justify-center items-center">
        <div class="w-1/2 flex justify-start items-center">
          <a href="<?php route('/forgot') ?>" class="text-sm ml-2 hover:text-emerald-700 cursor-pointer">Esqueceu seu e-mail?</a>
        </div>
        <div class="w-1/2 flex justify-end items-right">
          <button type="submit" class="block px-6 bg-emerald-400 mt-4 py-2 rounded-md text-white font-semibold mb-4 drop-shadow-md">Enviar</button>
        </div>
      </div>
    </form>
  </div>
</div>
