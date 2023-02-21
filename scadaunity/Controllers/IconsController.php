<?php

namespace ScadaUnity\Controllers;

/**
 *
 */
class IconsController
{
  public function index(){
     view('template/header');
     view('@icons');
  }
}
