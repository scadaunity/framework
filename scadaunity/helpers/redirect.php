<?php

use ScadaUnity\Http\Router;
use ScadaUnity\Http\Request;

/** Metodo responsavel por redirecionar
  * @param string $url
  */
function redirect($url)
{
  return header('location:'.URL.$url);
}

/** Metodo responsavel por redirecionar com flash message
  * @param string $url
  * @param string $bag
  * @param string $message
  */
function redirectWithFlash($url,$bag,$message)
{
  setFlash($bag,$message);
  return header('location:'.URL.$url);
}

/**
 * Metodo responsavel por imprimir a rota no html
 * @param  string $route
 * @return string
 */
function route(string $route = null)
{
    echo URL.$route;
}


function isRoute(string $route = null,int $segment = 0) : bool
{
  $request = new request();
  if($route == $request->segments()[$segment]){
    return true;
  } else {
    return false;
  }
  
}
