<?php

use Core\Http\Router;
use Core\Env;

/** inicia uma sessão vazia */
session_start();

/** Carrega os arquivos do composer */
require_once '../vendor/autoload.php';

/** Carrega as configurações */
require_once '../app/config/app.php';
require_once '../app/config/constants.php';
require_once '../app/config/database.php';
require_once '../app/config/debug.php';
require_once '../app/config/features.php';
require_once '../app/config/models.php';

/** carrega os helpers */
require_once 'helpers/environment.php';
require_once 'helpers/debug.php';
require_once 'helpers/assets.php';
require_once 'helpers/flash.php';
require_once 'helpers/redirect.php';
require_once 'helpers/routes.php';
require_once 'helpers/sessions.php';
require_once 'helpers/env.php';
require_once 'helpers/token.php';
require_once 'helpers/validate.php';


/** carrega libs do core */
require_once 'view.php';
require_once 'controller.php';


/** Carrega as variaveis de ambiente do projeto */
Env::load();

 try {
      /** Instancia a classe router*/
     $router = new Router(URL);

     /** Carrega os arquivos de rotas */
     require '../app/routes/api.php';
     require '../app/routes/web.php';
     require '../app/routes/console.php';

     if (getenv('APP_ENV') == 'local') {
       require 'routes/api.php';
       require 'routes/web.php';
       require 'routes/console.php';
     }


     /** resolve a rota */
     $router->run();

 } catch(\Exception $e){

      dd($e->getMessage());
}
