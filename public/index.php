<?php

use ScadaUnity\Http\Router;

/** Carrega o autoload do composer */
require_once '../vendor/autoload.php';

/** inicia uma sessão vazia */
session_save_path ('../storage/sessions');
session_start();

/* Carrega as configurações da aplicação */
require_once '../ScadaUnity/bootstrap.php';

/* Inicia a aplicação */
$router = new Router(URL);
$router->run();
