<?php

use Core\Http\Request;
use Core\Http\Response;

/**
 * Metodo responsavel por renderizar a view
 * @param  string $view
 * @param  array $params
 * @return string
 */
function view($view, $params = []){
  // Instancia de request
  $request = new Request();

  // pega o conteudo da view
  $contentView = getContentView($view);

  // pega as variaveis globais
  $defaultVars = getGlobalVariables();

  // junta as variaveis globais com as variaveis passadas no controller
  $vars = array_merge($defaultVars,$params);

  //pega as chaves do array de variaveis
  $keys = array_Keys($vars);

  // formata as variaveis
  $keys = array_map(function($item){
    return '{{'.$item.'}}';
  },$keys);

  //armazena a view com as variaveis passadas
  $output = str_replace($keys,array_values($vars),$contentView);

  return $output;

}

function getContentView($view){
  return file_exists(VIEWS.$view.'.php') ? file_get_contents(VIEWS.$view.'.php') : '';
}

function getGlobalVariables(){

  // Define os dados da view en todas as requisições
  $data = [
    'URL' => URL,
    'APP_TITLE' => APP_TITLE,
    'ENV' => ENVIRONMENT,
    'ROOT' => ROOT,
    'VIEWS' => VIEWS,
    'CSS_PATH' => CSS_PATH,
    'JS_PATH' => JS_PATH,
    'IMG_PATH' =>IMG_PATH,
    'LOGGED' => LOGGED,
    'CSRF' =>csrf()
  ];

  // adiciona as flash messages ao template
  $flash = getAllFlash();
  if (!$flash == null) {
    foreach ($flash as $key => $value) {
      $data['flash.'.$key]=$value;
    }
  }

  $user = user();
  if ($user) {
    $data['user.id']=$user->id;
    $data['user.name']=$user->name;
    $data['user.email']=$user->email;
  }

  return $data;
}
