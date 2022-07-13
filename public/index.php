<?php

use ScadaUnity\Framework\Http\Router;

/** Carrega o autoload do composer */
require_once '../vendor/autoload.php';



/* Carrega as configurações da aplicação */
require_once '../scadaunity/framework/bootstrap.php';



/* Inicia a aplicação */
$router = new Router(URL);
//dd($router);
$router->run();
