<?php

use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Router;

function route(){
  $obroutes = new Request();
  return $obroutes->uri();
}

function routes(){
  $obroutes = new Router();
  return $obroutes;
}
