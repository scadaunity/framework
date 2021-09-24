<?php

use Core\Http\Router;
use Core\Assets\Css;
use Core\Database\Database;
use Core\Database\QueryBuilder;
use Core\Env;


/** inicia uma sessão vazia */
session_start();

/** Carrega os arquivos do composer */
require_once '../vendor/autoload.php';

/** Carrega as variavei de ambiente do projeto */

//\Core\Env::load(__DIR__);

/** Carrega as configurações */
require_once '../app/config/app.php';
require_once '../app/config/constants.php';
require_once '../app/config/database.php';
require_once '../app/config/debug.php';

/** carrega os helpers */
require_once 'helpers/environment.php';
require_once 'helpers/debug.php';
require_once 'helpers/assets.php';
require_once 'helpers/flash.php';
require_once 'helpers/redirect.php';
require_once 'helpers/env.php';


/** carrega libs do core */
require_once 'view.php';
require_once 'controller.php';




 try {
      /** Instancia a classe router*/
     $router = new Router(URL);

     /** Carrega os arquivos de rotas */
     require '../app/routes/api.php';
     require '../app/routes/web.php';
     require '../app/routes/console.php';

     //dd($router->routes());

     /** resolve a rota */
     $router->run();



 } catch(\Exception $e){

      dd($e->getMessage());
}
