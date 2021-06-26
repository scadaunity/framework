<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'vendor/autoload.php';

use Scadaunity\Router\Router;

session_start();


try {

    $router = new Router;

    echo "# LOADING ROUTE FILES.."."<br>";
    require __DIR__ . '/app/config/routes/api.php';
    require __DIR__ . '/app/config/routes/web.php';
    require __DIR__ . '/app/config/routes/console.php';

} catch(\Exception $e){

    echo $e->getMessage();
}
