
<!-- Hero Banner Section -->

    <section class="hero-banner  py-5">
        <div class="container">
            <div class="row row align-items-center">
                <div class="col-lg-5 offset-lg-1 order-lg-1">
                    <img src="https://www.markuptag.com/images/web-development-vector.png" class="img-fluid" alt="Web Development">
                </div>
                <div class="col-lg-6">

                    <h2 class="mt-3">Bem vindo
                      <?php if (logged()) : ?>
                        <?php echo user()->name ?>
                      <?php else : ?>
                        Dev
                    </h2>

                    <?php endif; ?>
                    <h6>Até aqui tudo bem nosso framework ja esta, instalado e funcionando</h6>
                    <p>Nosso objetivo é criar uma experiencia simples em desenvolver seus codigos php</p>
                    <p>Esta é a tela de boas vindas, será usada para a rota inicial do seu projeto</p>
                    <p class="text-muted">Edite o arquivo app/Views/welcome.php</p>
                    <p class="lead text-secondary my-5">Aproveite</p>

                </div>
            </div>
        </div>
    </section>
