<?php

namespace Core\Controllers;

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
