
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
                <form class="mb-3" action="/autenticate" method="post">
                  <?php csrf() ?>

                    <!-- email -->
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control rounded-left" placeholder="Email" value="scadaunity@gmail.com" autocomplete="username">
                    </div>

                    <!-- password -->
                    <div class="form-group mb-3">
                        <input type="password" name="password"  class="form-control rounded-left" placeholder="Senha" value="123456" autocomplete="current-password">
                    </div>

                    <div class="form-group d-md-flex mb-3">
                        <div class="w-50">

                        </div>
                        <div class="w-50 text-right">
                          <label class="">Manter conectado
                              <input type="checkbox" checked>
                              <span class="checkmark"></span>
                          </label>
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center">
                        <button type="submit" name="" value="Entrar" class="btn btn-primary rounded submit p-3 px-5">Entrar</button>
                    </div>
                </form>
                <div class="form-group d-md-flex mb-3">
                    <div class="w-50 text-md-right">
                        <a href="/forgot">Forgot Password</a>
                    </div>
                    <div class="w-50 text-md-right">
                        <a href="/forgot">Forgot Password</a>
                    </div>
                </div>
          </div>
