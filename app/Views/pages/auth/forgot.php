<div class="text-center">
    <form class="" action="/forgot" method="post" style="width:320px;margin:auto">
      <?php csrf() ?>
        <img class="mt-5" src="assets/img/Logo.png" width="100px" height="100px">
        <h1 class="h3 mt-4 mb-4 font-weight-normal">Recuperar acesso</h1>
        <h6 class="text-secondary mb-3">Por favor, informe seu email de cadastro.</h6>
        <div class="form-group mb-4">
            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="" autocomplete="email" placeholder="Email">
        </div>

        <div class="mt-3 mb-5 d-grid gap-2 col-12 mx-auto">
            <button type="submit" name="button" class="btn btn-lg btn-success btn-block rounded-pill">Continuar</button>
        </div>
        <div class="row">
            <div class="col">
                <a href="/login" class="link-secondary">Fazer login</a>
            </div>
            <div class="col">
                <a href="/register" class="link-secondary">Criar conta</a>
            </div>
        </div>
    </form>
</div>
