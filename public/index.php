<?php

use ScadaUnity\Http\Router;

/** Carrega o autoload do composer */
require_once '../vendor/autoload.php';

/* Carrega as configurações da aplicação */
require_once '../bootstrap.php';

/* Inicia a aplicação */
$router = new Router(URL);
$router->run();
