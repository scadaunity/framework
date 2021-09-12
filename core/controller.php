<?php

function controller($matchedUri, $params){

  /** Cria uma lista com o controller e o metodo*/
  [$controller,$method] = explode('@', array_values($matchedUri)[0]);

  $controllerWhitNamespace = CONTROLLERS_PATH.$controller;

  if (!class_exists($controllerWhitNamespace)) {
    throw new \Exception("Controller {$controller} não existe");
  }

  $obController = new $controllerWhitNamespace();

  if(!method_exists($obController, $method)){
    throw new \Exception("O metodo {$method} não existe");
  }

  $obController->$method($params);

}
