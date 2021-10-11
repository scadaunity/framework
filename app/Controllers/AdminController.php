<?php

namespace App\Controllers;

use Core\Http\Router;

/**
 * Resource controller created by
 */
class AdminController
{

  function __construct()
  {
    // code...
  }

  public function users(){
    return view('home');
  }
}
