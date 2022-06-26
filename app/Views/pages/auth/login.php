<!-- component -->

  <div class="mx-auto shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-900 w-full md:w-96 mt-6">
        <div class="w-full flex justify-center items-center text-green-600">
            <?php component('ApplicationLogo') ?>
        </div>
        <div class="w-full flex justify-center items-center">
            <h1 class="text-gray-800 font-bold text-2xl p-6 dark:text-white"><?= $title ?></h1>
        </div>

        <div class="w-full flex justify-center items-center mb-4">
            <?php getFlash('invalidLogin') ?>
            <?php getFlash('notLogged') ?>
        </div>


        <form class="" method="post" action="<?php route('/autenticate') ?>">
              <?php csrf() ?>
              <div class="w-full flex justify-center items-center">
                    <?php getFlash('email') ?>
              </div>
              <div class="flex items-center border-2 dark:border-gray-700 py-4 px-3 rounded-md mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input class="w-full w-full outline-none text-gray-500 dark:bg-gray-900" type="text" name="email" id="" placeholder="Email" />
              </div>


              <?php getFlash('password') ?>
              <div class="flex items-center border-2 dark:border-gray-700 py-4 px-3 rounded-md mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-4" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    <input class="w-full rounded-full outline-none text-gray-500 dark:bg-gray-900" type="text" name="password" id="" placeholder="Senha" />
              </div>

              <div>
                    <label class="inline-flex items-center cursor-pointer mb-4">
                      <input id="customCheckLogin" type="checkbox" class="bg-indigo-600 form-checkbox border-0 rounded text-gray-400 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                      <span class="ml-2 text-sm  text-gray-600">Lembrar</span>
                    </label>
              </div>

              <div class="w-full flex justify-center items-center">
                    <div class="w-1/2 flex justify-start items-center">
                        <a href="<?php route('/forgot') ?>" class="text-sm ml-2 hover:text-emerald-700 dark:text-gray-200 dark:hover:text-green-300 cursor-pointer">Esqueci minha senha ?</a>
                    </div>
                    <div class="w-1/2 flex justify-end items-right">
                        <button type="submit" class="block px-6 ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Entrar</button>
                    </div>
              </div>
        </form>
  </div>
