<section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <img class="mt-5" src="<?= baseUrl('/assets/img/Logo.png') ?>" width="100px" height="100px" alt="ScadaUnity - Logo">
                    <hr class="login-hr">
                    <p class="subtitle has-text-black">Iniciar sessão.</p>
                    <div class="box">
                        <form>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="email" placeholder="Email" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="password" placeholder="Senha">
                                </div>
                            </div>
                            <div class="field">
                                <label class="checkbox">
                                    <input type="checkbox">
                                    Lembrar
                                </label>
                            </div>
                            <button class="button is-block is-success is-large is-fullwidth">Continuar</button>
                        </form>
                    </div>
                    <p class="has-text-grey">
                        <a href="../">Sign Up</a> &nbsp;·&nbsp;
                        <a href="../">Forgot Password</a> &nbsp;·&nbsp;
                    </p>
                </div>
            </div>
        </div>
    </section>
<div class="text-center mt-5">
    <form class="" action="<?= baseUrl('/autenticate')  ?>" method="post" style="width:320px;margin:auto">
        <?php csrf() ?>
        <img class="mt-5" src="<?= baseUrl('/assets/img/Logo.png') ?>" width="100px" height="100px" alt="ScadaUnity - Logo">
        <h1 class="h3 mt-4 mb-4 font-weight-normal">Iniciar sessão</h1>

        <div class="input-group mb-3">
            <label for="email" class="sr-only">Email</label>
            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="email" id="email" name="email" class="form-control" value="" autocomplete="email">
        </div>

        <div class="input-group mb-3">
            <label for="password" class="sr-only">Password</label>
            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="password" id="password" name="password" class="form-control" value="" autocomplete="current-password">
        </div>
        <div class="mb-3 form-check" style="text-align:left">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Lembrar</label>
        </div>
        <div class="mt-3 mb-5 d-grid gap-2 col-12 mx-auto">
            <button type="submit" name="button" class="btn btn-lg btn-success btn-block rounded-pill">Continuar</button>
        </div>
        <div class="row">
            <div class="col">
                <a href="<?= baseUrl('/forgot')  ?>" class="link-light">Não lembro a senha</a>
            </div>
            <div class="col">
                <a href="<?= baseUrl('/register')  ?>" class="link-light">Criar conta</a>
            </div>
        </div>
    </form>
</div>
