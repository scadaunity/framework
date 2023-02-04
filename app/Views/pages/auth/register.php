<!-- component -->
<div class="auth-container">
  <form class="" method="post" action="<?php route('/create/account') ?>">
    <?php csrf() ?>
  
    <div class="authFormItem">
        <?php component('ApplicationLogo') ?>
    </div>
    <div class="authFormItem">
        <h1 class="text-gray-800 font-bold text-2xl p-6 dark:text-white"><?= $title ?></h1>
    </div>

    <div class="authFormItem">
        <?php getFlash('invalidLogin') ?>
        <?php getFlash('notLogged') ?>
    </div>


    
      
      <div class="w-full flex justify-center items-center">
        <?php getFlash('email') ?>
      </div>
      <div class="authFormInput">
        <input class="w-full w-full outline-none text-gray-500 dark:bg-gray-800" type="text" name="name" id="" placeholder="Nome" />
      </div>

      <div class="authFormInput">
        <input class="w-full w-full outline-none text-gray-500 dark:bg-gray-800" type="email" name="email" id="" placeholder="Email" />
      </div>


      <?php getFlash('password') ?>
      <div class="authFormInput">
        <input class="w-full rounded-full outline-none text-gray-500 dark:bg-gray-800" type="text" name="password" id="" placeholder="Senha" />
      </div>

      <div class="w-1/2 mx-auto flex mb-4">
        <button type="submit" class="block mx-auto px-6 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Continuar</button>
      </div>

      <div class="w-1/2 flex justify-center mx-auto items-center">
        <a href="<?php route('/forgot') ?>" class="text-sm ml-2 hover:text-emerald-700 dark:text-gray-200 dark:hover:text-green-300 cursor-pointer">Não lembro minha senha ?</a>
      </div>

      <div class="w-full flex justify-center items-center">


      </div>
    

    </form>
  
</div>
