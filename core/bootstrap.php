<?php

use Core\Router\Router;

/** inicia uma sessão vazia */
session_start();

/** Carrega os arquivos do composer */
require_once '../vendor/autoload.php';

/** Carrega as configurações */
require_once '../app/config/app.php';
require_once '../app/config/constants.php';
require_once '../app/config/database.php';
require_once '../app/config/debug.php';
require_once '../app/config/router.php';

/** Load core services */
require_once 'environment.php';
require_once 'debug.php';


 try {
      /** Instancia a classe router*/
     $router = new Router(URL);
     dd($router);
     /** Carrega os arquivos de rotas */
     require '../app/routes/api.php';
     require '../app/routes/web.php';
     require '../app/routes/console.php';

     /** resolve a rota */
     //$router->resolve();


 } catch(\Exception $e){

     echo $e->getMessage();
}
