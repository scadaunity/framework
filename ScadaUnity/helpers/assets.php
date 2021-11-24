<?php

/**
 * Metodo responsavel por adicionar arquivos css
 * @param  string  $file
 * @return Css
 */
function css($file){
  echo CSS_PATH.$file.'.css';
}

/**
 * Metodo responsavel por adicionar arquivos js
 * @param  string|array  $file
 * @return Js
 */
function js($files){

  if (is_array($files)) {
    foreach ($files as $file) {
      echo '<script src="'.JS_PATH.'/'.$file.'.js"></script>';
    }
  } else{
    echo '<script src="'.JS_PATH.'/'.$files.'.js"></script>';
  }

}

/**
 * Metodo responsavel por adicionar imagens
 * @param  string  $file
 * @return Img
 */
function img($file){
  echo IMG_PATH.$file;
}

function baseUrl($path){
  return URL.$path;
}
