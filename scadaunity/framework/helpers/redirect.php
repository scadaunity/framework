<?php

use ScadaUnity\Framework\Http\Router;

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
function route($route){
    echo URL.$route;
}
