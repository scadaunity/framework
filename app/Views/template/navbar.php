<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
  <div class="container-fluid">
    <!-- Logo e link pra home -->
    <a class="navbar-brand" href="/">
      <img src="<?php echo IMG_PATH; ?>/Logo.png" alt="Brand logo" width="30" height="30">
      <span>Scada</span>
      <span>Unity</span>
    </a>

    <!-- Botão de navegação mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Barra de navegação -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Barra de navegação esquerda -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 position-relative start-0">


        </ul>

      <!-- Barra de navegação direita -->
      <ul class="navbar-nav position-relative end-0">
        <?php if (logged()) : ?>

          <!-- apps -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-th" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Money</a></li>
              <li><a class="dropdown-item" href="#">GTD</a></li>

            </ul>
          </li>

          <!-- notificações -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell animate__bounce" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" style="width: 300px;" aria-labelledby="navbarDropdown">
              <li><h6 class="dropdown-header">Notificações</h6></li>
              <li>
                <div class="container">
                  <div class="row align-items-start">
                    <div class="col">
                      One
                    </div>
                    <div class="col">
                      two
                    </div>
                    <div class="col">
                      three
                    </div>
                  </div>
                </div>
                </li>

              <li><a class="dropdown-item" href="#">Configurações</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-center" href="/notificações">Ver todas</a></li>
            </ul>
          </li>

          <!-- Usuario -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user-circle" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-small shadow" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Meu perfil</a></li>
              <li><a class="dropdown-item" href="#">Configurações</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/logout">Sair</a></li>
            </ul>
          </li>
        <?php else : ?>
          <div class="text-end">
            <button class="btn btn-outline-light me-2" onclick="view('login')">Login</button>
            <a href="/register" class="btn btn-warning">Cria conta</a>
          </div>
        <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>
