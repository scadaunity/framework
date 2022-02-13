<?php

use ScadaUnity\Framework\Http\Router;

/** Carrega o autoload do composer */
require_once '../vendor/autoload.php';

/** inicia uma sessão vazia */
//session_save_path ('../storage/sessions');
session_save_path( sys_get_temp_dir());
session_start();

/* Carrega as configurações da aplicação */
require_once '../scadaunity/framework/bootstrap.php';

setToken();

/* Inicia a aplicação */
$router = new Router(URL);
//dd($router);
$router->run();
