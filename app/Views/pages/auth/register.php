<div class="text-center">
    <form class="" action="/create/account" method="post" style="width:320px;margin:auto">
      <?php csrf() ?>
        <img class="mt-5" src="assets/img/Logo.png" width="100px" height="100px">
        <h1 class="h3 mt-4 mb-4 font-weight-normal">Criar minha conta</h1>

        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="email" id="email" name="email" class="form-control" value="" autocomplete="email">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="password" id="password" name="password" class="form-control" value="" autocomplete="current-password">
        </div>
        <div class="mb-3 form-check" style="text-align:left">
            <input type="checkbox" class="form-check-input" id="ac" name="remember" required>
            <label class="form-check-label" for="remember">Li e aceito os <a href="/therms" target="_blank" class="link-secondary">Termos do serviço</a> </label>
        </div>
        <div class="mb-3 form-check" style="text-align:left">
            <input type="checkbox" class="form-check-input" id="ac" name="remember" required>
            <label class="form-check-label" for="remember">Li e aceito a <a href="/privacy" target="_blank" class="link-secondary">Politica de privacidade</a></label>
        </div>
        <div class="mt-3 mb-5 d-grid gap-2 col-12 mx-auto">
            <button type="submit" name="button" class="btn btn-lg btn-success btn-block rounded-pill">Continuar</button>
        </div>

        <a href="/login" class="link-secondary">Fazer login</a>
        
    </form>
</div>
