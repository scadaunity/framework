<?php

namespace App\Controllers;

use Core\Http\Request;

/**
 *
 */
class AuthController
{

  function __construct()
  {
    // code...
  }

  public function login(){
      $data = [

      ];
      view('auth/login');
  }

  public function autenticate(){
    $request = new Request();
    dd($request->post());
  }
}
