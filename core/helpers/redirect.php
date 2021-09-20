<?php

/** Metodo responsavel por eliminar methodos
  * @param string $url
  */
function redirect($url)
{
  return header('location:'.$url);
}
