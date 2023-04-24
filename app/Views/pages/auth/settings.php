<!-- Header -->
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex itens-center justify-start">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-1 mr-2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
    <h1 class="text-2xl text-gray-600 dark:text-gray-200 italic font-extrabold antialised">Configurações da conta</h1>
</div>

<!-- Section -->
<section class="max-w-7xl mx-auto py-5 sm:px-6 lg:px-8 rounded-xl shadow-sm">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <!--Section Title -->
        <div class="md:col-span-1 flex justify-between pr-4 dark:border-gray-800">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium">
                    <slot name="title">Perfil</slot>
                </h3>
                    <p class="mt-1 pl-4 min-w-xs text-sm">
                        <span name="description"># Informações basica da sua conta</span>
                    </p>
            </div>
        </div>
        
        <!--Content -->
        <div class="mt-5 md:mt-0 md:col-span-2 rounded-md shadow-xl">
            <form method="post" action="<?php route('/account') ?>">
                <?php csrf() ?>
                <div class="mx-2 px-4 py-5 sm:p-6  dark:ring-inset dark:ring-white  md:flex space-x-2">
                    <!-- Account name -->
                    <div class="relative mb-4 md:w-full">
                        <label class="text-sm" for="">Nome</label>
                        <input disable='' class="rounded-sm border-transparent flex appearance-none border border-gray-300 w-full py-2 px-4 bg-white dark:bg-slate-900 text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-1 focus:ring-slate-600 focus:border-transparent" type="text" name="account-name" value="<?php user('name') ?>">
                    </div>
                </div>
                <div class="flex items-center justify-end p-4">
                    <button type="button" class="flex items-center justify-end h-10 px-6 text-sm font-medium text-white transition-colors duration-300 bg-gray-800 rounded-lg pointer-events-auto hover:bg-gray-600 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-gray-700"><span>Salvar</span></button>
                </div>      
            </form>
        </div>
    </div>

</section>