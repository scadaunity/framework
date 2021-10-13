<?php

/**
 * Metodo responsavel por renderizar a view
 * @param  string $view
 * @param  array $params
 * @return string
 */
function view($view, $params = []){
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

  //dd($keys);
  //armazena a view com as variaveis passadas
  $output = str_replace($keys,array_values($vars),$contentView);

  // Faz o bind das variaveis na view
  return $output;
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

  // Se houver flash message adiciona aos dados

  setFlash('message','Mensagem encontrado com sucesso');

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
