<?php

use Scadaunity\Router\Route;
use Scadaunity\Router\Request;
use ScadaUnity\Components\Env;

require_once '../vendor/autoload.php';

Env::load();

/** LOAD ENVIRONMENT - LOCAL*/
// if(getenv('APP_ENV' == 'local')){
//   error_reporting(E_ALL);
//   ini_set('display_errors', true);
// }

// session_start();
//
//
//
// try {
//     $request = new Request;
//     $route = new Route;
//
//     require __DIR__ . '/app/routes/api.php';
//     require __DIR__ . '/app/routes/web.php';
//     require __DIR__ . '/app/routes/console.php';
//
//     Route::resolve($request);
//
// } catch(\Exception $e){
//
//     echo $e->getMessage();
// }
