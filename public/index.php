<?php

use ScadaUnity\Http\Router;

error_reporting(E_ALL);
ini_set('display_errors', 1);

/** Carrega o autoload do composer */
require dirname(__DIR__).'/vendor/autoload.php';


/* Carrega as configurações da aplicação */

require dirname(__DIR__).'/bootstrap.php';

/* Inicia a aplicação */
$router = new Router(URL);
$router->run();



