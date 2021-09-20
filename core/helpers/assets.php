<?php

function css($files = []){

  // procura os arquivos css
  $cssDir = scandir(CSS_PATH);

  foreach ($cssDir as $css) {
    $cssFile = CSS_PATH.$css;

    if(is_file($cssFile) && pathinfo($cssFile) ["extension"] == 'css'){
      echo "<link rel='stylesheet' href='assets/css/" .$css ."'>";
      //d($cssFile);
    }
  }
}

  function js(){

    // procura os arquivos css
    $jsDir = scandir(JS_PATH);


    foreach ($jsDir as $js) {
      $jsFile = JS_PATH.$js;
      if(is_file($jsFile) && pathinfo($jsFile) ["extension"] == 'js'){
        echo "<script src='assets/js/" .$js ."'/>";
      }
    }
}
