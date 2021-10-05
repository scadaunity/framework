<?php

use Core\Http\Request;

function route(){
  $obroutes = new Request();
  return $obroutes->uri();
}
