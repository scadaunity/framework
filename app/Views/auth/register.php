
        <div class="row justify-content-center">
            <!-- card login -->
            <div class="col-md-6 col-lg-4 border rounded mt-5 mb-5">
                <!-- app logo -->
                <div class="p-4 p-md-5">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="assets/img/Logo.png" width="100px" height="100px">
                    </div>
                </div>
                <!-- Page title -->
                <h3 class="text-center mb-4"><?php echo $title ?></h3>
                <!-- App title -->
                <h6 class="text-center mb-4"><?php echo APP_TITLE ?></h6>

                <!-- Form login -->
                <form class="mb-3" action="/create/account" method="post">
                  <?php csrf() ?>

                  <!-- nome -->
                  <div class="form-group mb-3">
                      <label for="name" class="form-label">Nome</label>
                      <input type="text" name="name" class="form-control rounded-left" placeholder="Nome" value="scadaunity@gmail.com" autocomplete="username">
                  </div>

                    <!-- email -->
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control rounded-left" placeholder="Email" value="scadaunity@gmail.com" autocomplete="username">
                    </div>

                    <!-- password -->
                    <div class="form-group mb-3">
                        <input type="password" name="password"  class="form-control rounded-left" placeholder="Senha" value="123456" autocomplete="current-password">
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center">
                        <button type="submit" name="" value="Entrar" class="btn btn-primary rounded submit p-3 px-5">Prosseguir</button>
                    </div>
                </form>
                <div class="form-group flex mb-3">
                    <a href="/login">Fazer login</a>
                </div>
          </div>
