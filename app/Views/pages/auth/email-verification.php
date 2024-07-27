

<!-- component -->
<div class="auth-container">
	<form method="post" action="<?php route('/password/reset') ?>">
		<?php csrf() ?>	
	
		<div class="center">
			<?php component('ApplicationLogo') ?>
		</div>
		<div class="center">
			<h1 class="authFormTitle"><?= $title ?></h1>
		</div>

        <div class="w-full flex justify-center items-center">
            <p class="text-sm font-normal text-gray-600 mb-7">Por favor, digite o codigo de recuperação,</p>
        </div>
	
		<div class="mt-2">
			<label class="form-label" for="email">Codigo</label>
			<div class="mt-1">
				<input class="form-input" type="email" name="email" id=""/>
			</div>
			<?php getFlash('email') ?>
		</div>
			
		<button type="submit" class="form-submit">Verificar</button>
		
	</form>
</div>



