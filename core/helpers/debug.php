<?php


function dd($var){
  debugHeader();

  debugNavbar();

  //echo "<pre>";
  //var_dump($var);
  //die();
}

function d($var){
  echo "<pre>";
  var_dump($var);
}

function debugHeader(){
  view('template/header');
    echo '<div class="container bg-danger text-white p-3 mt-3">';
      echo '<h1>Debugbar</h1>';
    echo '</div>';
}

function debugnavbar(){
  echo 'navbar';
}
