<?php

/**
 * Metodo responsavel por retornar os dados do usuario logado
 * @return Object
 */
function user(string $field = null)
{
  // Verifica se existe um usuario logado
  if(!isset($_SESSION[LOGGED])){
    return null;
  }

  $user = $_SESSION[LOGGED];

  // Retorna o campo do usuario se foi passado o field
  if(!$field == null){
    foreach ($user as $key => $value) {
      if($key == $field){
        echo $value;
      }
    }
  }

  return $user;

}

/**
 * Metodo responsavel por checar o usuario logado
 * @return boolean
 */
function logged()
{
  return isset($_SESSION[LOGGED]);
}

/**
 * Metodo responsavel por inserir um token dentro do formulario html
 */
function csrf()
{
  echo "<input type='hidden' name='_csrf' value='".$_SESSION['token']."'>".PHP_EOL;
}
/**
 * Metodo responsavel por retornar o token de sessão
 */
function getToken(){
  if (isset($_SESSION['token'])) {
    return $_SESSION['token'];
  }
}

/**
 * Metodo responsavel por gerar um token de sessão
 */
function setToken(){
  $_SESSION['token'] = bin2hex(random_bytes(32));
}

function generateTokenForgot(){

}
