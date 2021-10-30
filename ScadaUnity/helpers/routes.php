<?php

use ScadaUnity\Http\Request;
use ScadaUnity\Http\Response;
use ScadaUnity\Http\Router;

function route(){
  $obroutes = new Request();
  return $obroutes->uri();
}

function routes(){
  $obroutes = new Router();
  return $obroutes;
}
