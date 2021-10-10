<?php

/**
 * Metodo responsavel por retornar os dados do usuario logado
 * @return Object
 */
function user(){
  if (isset($_SESSION[LOGGED])) {
    // remove o password
    unset($_SESSION[LOGGED]->password);
    //retorna o usuario logado
    return $_SESSION[LOGGED];
  }
}

function logged(){
  return isset($_SESSION[LOGGED]);
}
