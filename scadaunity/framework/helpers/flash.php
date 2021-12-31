<?php

function setFlash($index, $message){
  if(!isset($_SESSION['flash'][$index])){
    $_SESSION['flash'][$index] = $message;
  }
}

function getFlash($index, $class = "text-red-500 text-xs italic"){
  if (isset($_SESSION['flash'][$index])) {
    $flash = $_SESSION['flash'][$index];
    unset($_SESSION['flash'][$index]);
    echo "<p class='$class'>$flash.</p>";
  }
}

function getAllFlash(){
  if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
  }
}
