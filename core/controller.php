<?php

function controller($matchedUri){

  /** Cria uma lista com o controller e o metodo*/
  [$controller,$method] = explode('@', array_values($matchedUri)[0] ) ;
  d($controller);
  
  if (class_exists("App\\Controllers\\".$controller)) {
    echo "existe";
  }
  else{
    echo "Não existe";
  }
}
