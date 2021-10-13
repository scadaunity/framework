<?php

namespace Core\Controllers;

use Core\Http\Router;

/**
 *
 */
class AxiosController
{
  public function getRoutes(){
    $router = new Router();
    dd($router->routes('get'));
  }
}
