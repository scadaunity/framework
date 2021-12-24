<nav class="navbar navbar-expand-lg navbar-dark " id="navbar">
  <div class="container-fluid">
    
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
            <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
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
              <li><h6 class="dropdown-header">Troca de conta</h6></li>
              <li><a class="dropdown-item" href="#">Stella</a></li>
              <li><a class="dropdown-item" href="#">Sofia</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?= baseUrl('/logout') ?>">Sair</a></li>
            </ul>
          </li>
        <?php else : ?>
          <div class="text-end">
            <a href="<?= baseUrl('/login') ?>" class="btn btn-outline-light me-2">Entrar</a>
            <a href="<?= baseUrl('/register') ?>" class="btn btn-warning">Criar conta</a>
          </div>
        <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>

<header id="top-navbar">
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="<?php baseUrl('/') ?>">
        <?php component('ApplicationMark') ?>
        <span>Scada</span>
        <span>Unity</span>
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            More
          </a>

          <div class="navbar-dropdown">
            <a class="navbar-item">
              About
            </a>
            <a class="navbar-item">
              Jobs
            </a>
            <a class="navbar-item">
              Contact
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item">
              Report an issue
            </a>
          </div>
        </div>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <a class="button is-primary">
              <strong>Sign up</strong>
            </a>
            <a class="button is-light">
              Log in
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
