<?php

use ScadaUnity\Http\Router;

/** Metodo responsavel por redirecionar
  * @param string $url
  */
function redirect($url)
{
  return header('location:'.$url);
}

/** Metodo responsavel por redirecionar com flash message
  * @param string $url
  * @param string $bag
  * @param string $message
  */
function redirectWithFlash($url,$bag,$message)
{
  setFlash($bag,$message);
  return header('location:'.$url);
}

function redirectRoute($url){

}
