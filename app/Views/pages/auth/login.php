<!-- component -->
<div class="auth-container">
<div class="">
	<form method="post" action="<?php route('/autenticate') ?>">
		<?php csrf() ?>	
	
		<div class="item">
			<?php component('ApplicationLogo') ?>
		</div>
		<div class="item">
			<h1 class="authFormTitle"><?= $title ?></h1>
		</div>

		<?php getFlash('invalidLogin',) ?>
		<?php getFlash('notLogged') ?>		
	
		<div class="mt-2">
			
			<label class="form-label" for="email">Email</label>
			<div class="mt-1">
				<input class="form-input" type="email" name="email" id=""/>
			</div>
			<?php getFlash('email') ?>
		</div>
			
		
		<div class="mt-2">
			
			<label class="form-label" for="password">Senha</label>
			<div class="mt-1">
				<input class="form-input" type="password" name="password" id="" />
			</div>
			<?php getFlash('password') ?>
		</div>
			
		<button type="submit" class="btn w-full flex justify-center mt-6">Entrar</button>
		
		<a href="<?php route('/forgot') ?>" class="mt-6 w-full flex justify-center text-sm ml-2 hover:text-emerald-700 dark:text-slate-500 dark:hover:text-teal-500 cursor-pointer">Não lembro a senha? </a>
		
	</form>
</div>
	
</div>


