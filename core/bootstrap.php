<?php

use Core\Http\Router;
use Core\Assets\Css;
use Core\Database\Database;


/** inicia uma sessão vazia */
session_start();

/** Carrega os arquivos do composer */
require_once '../vendor/autoload.php';

/** Carrega as configurações */
require_once '../app/config/constants.php';
require_once '../app/config/database.php';
require_once '../app/config/debug.php';

/** Load core services */
require_once 'environment.php';
require_once 'debug.php';
require_once 'controller.php';
require_once 'assets.php';
require_once 'view.php';


//$db = new Database('mysql','127.0.0.1','framework','root','1234');
//dd($db);

function all(){
  try {
    $db = new Database('mysql','127.0.0.1','framework','root','1234');

    $connect = $db->connect();
    
    $query = $connect->query("select * from users");
    return $query->fetchAll();
  } catch (PDOException $e) {
    dd($e->getMessage());
  }

}

dd(all());


exit;

 try {
      /** Instancia a classe router*/
     $router = new Router(URL);


     /** Carrega os arquivos de rotas */
     require '../app/routes/api.php';
     require '../app/routes/web.php';
     require '../app/routes/console.php';



     /** resolve a rota */
     $router->run();



 } catch(\Exception $e){

      dd($e->getMessage());
}
