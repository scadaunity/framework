<?php

namespace ScadaUnity\Controllers;

/**
 *
 */
class AdminController
{
  public function index(){
    return view('auth/login',[],'single');
  }

  function __construct()
  {
    // code...
  }
}
