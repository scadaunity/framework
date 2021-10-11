<?php

/**
 * Metodo responsavel por renderizar a view
 * @param  string $view
 * @param  array $params
 * @return string
 */
function view($view, $params = []){
  // Conteudo da view
  $contentView = getContentView($view);

  $defaultVars = getGlobalVariables();

  $vars = array_merge($defaultVars,$params);


  //chaves do array de variaveis
  $keys = array_Keys($vars);
  $keys = array_map(function($item){
    return '{{'.$item.'}}';
  },$keys);

  return str_replace($keys,array_values($vars),$contentView);
}

/**
 * Metodo responsavel por resgatar o conteudo da view
 * @param  string $view
 * @return string
 */
function getContentView($view){
  $file = VIEWS.$view.'.php';
  return file_exists($file) ? file_get_contents($file) : '';
}

function getGlobalVariables(){
  return [
    'URL' => URL,
    'APP_TITLE' => APP_TITLE,
    'ENV' => ENVIRONMENT,
    'ROOT' => ROOT,
    'VIEWS' => VIEWS,
    'CSS_PATH' => CSS_PATH,
    'JS_PATH' => JS_PATH,
    'IMG_PATH' =>IMG_PATH,
    'LOGGED' => LOGGED,
  ];
}
