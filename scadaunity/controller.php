<?php

use ScadaUnity\Http\Request;

function controller($matchedUri, $params){
  //dd(is_callable($matchedUri['/template']));
  if(is_array($matchedUri)){
    foreach ($matchedUri as $key => $value) {
      if(is_callable($value)){
        return call_user_func($value);
      }
    }
  }
  
  
  /** Cria uma lista com o controller e o metodo*/
  [$controller,$method] = explode('@', array_values($matchedUri)[0]);

  /** Adiciona o namespace completo ao controller */
  $controllerWhitNamespace = CONTROLLERS_PATH.$controller;

  /** verifica se foi passado o namespace no arquivo de rotas */
  if (str_contains($controller,'\\')) {
    $controllerWhitNamespace = $controller;
  }

  /** Verifica se o controller existe */
  if (!class_exists($controllerWhitNamespace)) {
    throw new \Exception("Controller {$controller} não existe");
  }

  /** Cria a instancia do controller */
  $obController = new $controllerWhitNamespace();

  /** Verifica se o metodo existe */
  if(!method_exists($obController, $method)){
    throw new \Exception("O metodo {$method} não existe");
  }

  /** Invoca o metodo */
  $obController->$method($params);

}
