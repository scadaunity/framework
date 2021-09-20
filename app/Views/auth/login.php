<div class="container-fluid pt-4 mx-auto user-select-none">
    <div class="card bg-transparent border-0">
        <div class="row d-flex">
            <!-- Box - Esquerdo - inicio -->
            <div class="col-lg-5">
                <div class="row pb-5 d-flex justify-content-center">
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
                </div>
            </div>
            <!-- Box - direito - inicio -->
            <div class="col-lg-5">
                <div class="card border-0 px-4 py-5">
                  <div class="col d-flex justify-content-center">
                      <h1>Login</h1>
                  </div>

                    <!-- Formulario de login - inicio -->
                    <form class="" action="autenticate" method="post">
                      <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-lg" name="email" value="scadaunity@gmail.com">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Senha</label>
                        <input type="password" class="form-control form-control-lg" name="password" value="123456">
                      </div>



                      <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input mr-3" name="remember">
                        <label class="form-check-label text-sm pt-1 ml-3" for="exampleCheck1">
                          Lembrar
                        </label>
                      </div>
                      <div class="row px-3 mb-4">
                          <a href="#" class="ml-auto mb-0 text-sm">Não lembro a senha?</a>
                      </div>
                      <div class="row mb-3 mr-5">
                        <button type="submit" class="btn btn-success text-center">Entrar</button>
                      </div>
                      <div class="row mb-4 px-3">
                        <small class="font-weight-bold">Não tem conta??
                          <a class="text-success"> Criar conta gratis</a>
                        </small>
                      </div>
                    </form>
                    <!-- Formulario de login - fim -->
                    <div class="row px-3 mb-4">
                        <div class="line"></div>
                          <small class="or text-center">Ou</small>
                        <div class="line"></div>
                    </div>

                    <!-- Entra com conta existente - inicio -->
                    <div class="row mb-4 px-3 text-center bg-blue rounded pb-2 pt-2">

                      <div class="col d-flex justify-content-center">
                        <div class="facebook">
                            <div class="fa fa-facebook"></div>
                        </div>
                      </div>
                      <div class="col d-flex justify-content-center">
                        <div class="twitter">
                            <div class="fa fa-twitter"></div>
                        </div>
                      </div>
                      <div class="col d-flex justify-content-center">
                        <div class="linkedin">
                            <div class="fa fa-linkedin"></div>
                        </div>
                      </div>
                    </div>
                    <!-- Entra com conta existente - fim -->

                </div>
            </div>
        </div>
    </div>
</div>

<style media="screen">
body {
  background-color: #886ab5;
  overflow-x: hidden;
  overflow-y: auto;
  height: 100%;
}


.logo {
  width: 120px;
  height: 100px;
  margin-top: 20px;
  margin-left: 35px
}

.image {
  padding-top: 50px;
  width: 90%;
  height: 90%
}

.border-line {
  border-right: 2px solid #EEEEEE
}

.facebook {
  background-color: #3b5998;
  color: #fff;
  font-size: 18px;
  padding-top: 5px;
  border-radius: 50%;
  width: 35px;
  height: 35px;
  cursor: pointer;
  position:inherit;
  right: 50%;
}

.twitter {
  background-color: #1DA1F2;
  color: #fff;
  font-size: 18px;
  padding-top: 5px;
  border-radius: 50%;
  width: 35px;
  height: 35px;
  cursor: pointer
}

.linkedin {
  background-color: #2867B2;
  color: #fff;
  font-size: 18px;
  padding-top: 5px;
  border-radius: 50%;
  width: 35px;
  height: 35px;
  cursor: pointer
}


.line {
  height: 1px;
  width: 40%;
  background-color: #E0E0E0;
  margin-top: 10px
}

.or {
  width: 20%;
  font-weight: bold
}

.form-control:focus{
  -moz-box-shadow: none !important;
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
  border: 1px solid #198754;
  outline-width: 0
}

a{
  cursor: pointer;
}

</style>
