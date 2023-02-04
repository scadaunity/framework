<?php

/**
 * Metodo responsavel por criar uma flash message
 */
function setFlash($index, $message){
  if(!isset($_SESSION['flash'][$index])){
    $_SESSION['flash'][$index] = $message;
  }
}

/**
 * Metodo responsavel por retornar uma flash message
 */
function getFlash($index, $class = "text-red-500 text-xs italic w-full flex justify-center items-center py-2"){
  if (isset($_SESSION['flash'][$index])) {
    $flash = $_SESSION['flash'][$index];
    unset($_SESSION['flash'][$index]);
    echo "<p class='$class'>$flash.</p>";
  }
}

/**
 * Metodo responsavel por retornar todas as flash message
 */
function getAllFlash(){
  if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
  }
}
