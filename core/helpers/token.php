<?php

/**
 * Metodo responsavel por inserir um token dentro do formulario html
 */
function csrf(){
  echo "<input type='hidden' name='_csrf' value='".$_SESSION['token']."'>";
}

function getToken(){
  return $_SESSION['token'];
}

function setToken(){
  $_SESSION['token'] = bin2hex(random_bytes(32));
}

function checkToken(){

}