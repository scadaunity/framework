<?php

use Scadaunity\Router\Route;
use Scadaunity\Router\Request;
use Dotenv\Dotenv;

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'vendor/autoload.php';

session_start();

try {
    $request = new Request;
    $route = new Route;
    $dotenv = Dotenv::createImmutable (__DIR__);
    $dotenv->load();

    echo "<pre>";
    var_dump($dotenv);

    require __DIR__ . '/app/routes/api.php';
    require __DIR__ . '/app/routes/web.php';
    require __DIR__ . '/app/routes/console.php';

    $route->resolve($request);

} catch(\Exception $e){

    echo $e->getMessage();
}
