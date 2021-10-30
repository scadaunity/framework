<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{APP_TITLE}}</title>
    <link rel="stylesheet" href="assets/css/login.css">
  </head>
  <body>
    <div class="container bg-pacific-dream">

      <div class="card bg-glass">
        <div class="card-img">
            <img src="assets/img/Logo.png">
        </div>
        <div class="desc">
            <h6 class="primary-text">Scada Unity</h6>
            <h6 class="secondary-text">Criar uma conta</h6>
        </div>
        <form class="form" action="/create/account" method="post">
          {{CSRF}}
          <input type="text" name="name" class="email" placeholder="Nome" >
          <input type="text" name="email" class="email" placeholder="Email" >
          <input type="password" name="password"  class="email" placeholder="Senha" >
          <input type="submit" name="" value="Cria conta" class="btn-glass">
          <br>

        </form>

        <div class="card-footer">
            <div class="register">
              <a href="/login">
                <p class="secondary-text"> Ja tenho uma conta, fazer Login </p>
              </a>
            </div>
        </div>

      </div>

    </div>

    <script type="text/javascript">

    </script>

  </body>
</html>
