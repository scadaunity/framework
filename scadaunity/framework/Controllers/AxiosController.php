<?php

namespace ScadaUnity\Framework\Controllers;

use ScadaUnity\Framework\Http\Router;

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
