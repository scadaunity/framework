<!-- Hero Banner Section -->
    <section class="hero-banner bg-light py-5">
        <div class="container">
            <div class="row row align-items-center">
                <div class="col-lg-5 offset-lg-1 order-lg-1">
                    <img src="https://www.markuptag.com/images/web-development-vector.png" class="img-fluid" alt="Web Development">
                </div>
                <div class="col-lg-6">
                    <h1 class="mt-3">Bem vindo
                      <?php if (logged()) : ?>
                        {{user.name}}
                      <?php else : ?>
                        Visitante

                    </h1>
                    <p>Faça o login ou crie uma conta é gratis</p>
                    <?php endif; ?>
                    <p class="lead text-secondary my-5">Aproveite nossos pacotes</p>
                    <button class="btn btn-outline-secondary btn-lg border" onclick="view('/home')">Começar</button>
                </div>
            </div>
        </div>
    </section>
