<?php

namespace ScadaUnity\Framework\Controllers;

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
