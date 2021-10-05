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
 * @param  string  $file
 * @return Js
 */
function js($file){
  echo JS_PATH.$file.'.js';
}

/**
 * Metodo responsavel por adicionar imagens
 * @param  string  $file
 * @return Img
 */
function img($file){
  echo IMG_PATH.$file;
}
