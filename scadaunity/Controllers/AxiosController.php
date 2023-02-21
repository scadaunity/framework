<?php

namespace ScadaUnity\Controllers;

use ScadaUnity\Http\Router;

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
