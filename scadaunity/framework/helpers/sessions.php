<?php

/**
 * Metodo responsavel por retornar os dados do usuario logado
 * @return Object
 */
function user()
{
  if (isset($_SESSION[LOGGED])) {
    return $_SESSION[LOGGED];
  }
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
  echo "<input type='hidden' name='_csrf' value='".$_SESSION['token']."'>";
}

function getToken(){
  if (isset($_SESSION['token'])) {
    return $_SESSION['token'];
  }
}

function setToken(){
  $_SESSION['token'] = bin2hex(random_bytes(32));
}

function generateTokenForgot(){

}
