<!-- component -->
<div class="auth-container">
	<form method="post" action="<?php route('/autenticate') ?>">
		<?php csrf() ?>	
	
		<div class="center">
			<?php component('ApplicationLogo') ?>
		</div>
		<div class="center">
			<h1 class="authFormTitle"><?= $title ?></h1>
		</div>

		<?php getFlash('invalidLogin',) ?>
		<?php getFlash('notLogged') ?>		
	
		<div class="mt-2">
			
			<div class="mt-1">
				<label class="form-label" for="email">Email</label>
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
			
		<button type="submit" class="form-submit">Entrar</button>
		
		<a class="form-link" href="<?php route('/forgot') ?>" >Não lembro a senha? </a>
		
	</form>
</div>


