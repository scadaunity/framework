<?php view('template/header') ?>
<?php view('components/Navbar') ?>
<!-- Header -->
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex itens-center justify-start">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mt-1 mr-2 text-gray-600 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
    </svg>
    <h1 class="text-2xl text-gray-600 dark:text-gray-200 italic font-extrabold antialised"><?=$title ?></h1>
</div>

  <!-- Section -->
  <section class="max-w-7xl mx-auto py-5 sm:px-6 lg:px-8">
      <div class="md:grid md:grid-cols-3 md:gap-6">
          <!--Section Title -->
          <div class="md:col-span-1 flex justify-between border-r pr-4 dark:border-gray-800">
              <div class="px-4 sm:px-0">
                  <h3 class="text-lg font-medium">
                      <slot name="title">Criar nova conta</slot>
                  </h3>

                  <p class="mt-1 pl-4 min-w-xs text-sm">
                      <slot name="description"># Criar uma nova conta te possibilita saber onde você guarda seu dinheiro</slot>
                  </p>
              </div>
          </div>
        <!--Content -->
        <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="<?php route('/account') ?>">
                    <?php csrf() ?>
                    <div class="mx-2 px-4 py-5 bg-white sm:p-6 shadow dark:ring-1 dark:ring-inset dark:ring-white/10 dark:bg-slate-900 rounded-md md:flex space-x-2">
                        <!-- Account name -->
                        <div class="relative mb-4 md:w-3/4">
                            <label class="font-serif" for="">Nome da conta:</label>
                            <input class="rounded-lg border-transparent flex appearance-none border border-gray-300 w-full py-2 px-4 bg-white dark:bg-slate-900 text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-1 focus:ring-slate-600 focus:border-transparent" type="text" name="account-name" value="">
                        </div>
                        <!-- Account Balance -->
                        <div class="relative mb-4 md:w-1/4">
                            <label class="font-mono" for="">Saldo inicial:</label>
                            <input class="rounded-lg border-transparent flex appearance-none border border-gray-300 w-full py-2 px-4 bg-white dark:bg-slate-900 text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-1 focus:ring-slate-600 focus:border-transparent" type="text" name="account-initial-balance" value="">
                        </div>
                    </div>

                    <div class="mx-2 flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md dark:ring-1 dark:ring-inset dark:ring-white/10 dark:bg-slate-800" v-if="hasActions">
                        <button type="submit" class="block px-6 ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Salvar</button>
                    </div>
                </form>
            </div>
    </div>
  </div>




</section>

<?php view('template/footer') ?>
