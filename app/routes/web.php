<?php

use Scadaunity\Router\Route;

  Route::get('/', function(){
      echo "Página inicial";
  });

  Route::get('/test', function(){
      echo "teste";
  });
