<div class="text-center">
    <form class="" action="/create/account" method="post" style="width:320px;margin:auto">
      <?php csrf() ?>
        <img class="mt-5" src="assets/img/Logo.png" width="100px" height="100px">
        <h1 class="h3 mt-4 mb-4 font-weight-normal">Criar minha conta</h1>
        <div class="form-group mb-3">
            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="" placeholder="email" required>
        </div>
        <div class="form-group mb-3">
            <label for="password" class="sr-only">Senha</label>
            <input type="password" id="password" name="password" class="form-control rounded-3" value="" placeholder="Senha" required>
        </div>
        <div class="mb-3 form-check" style="text-align:left">
            <input type="checkbox" class="form-check-input" id="ac" name="remember" required>
            <label class="form-check-label" for="remember">Aceito os termos do serviço</label>
        </div>
        <div class="mt-3 mb-5 d-grid gap-2 col-12 mx-auto">
            <button type="submit" name="button" class="btn btn-lg btn-success btn-block rounded-pill">Continuar</button>
        </div>
        <div class="row">
            <div class="col">
                <a href="/login" class="link-secondary">Fazer login</a>
            </div>
            <div class="col">
                <a href="/therms" class="link-secondary">Termos do serviço</a>
            </div>
        </div>
    </form>
</div>
