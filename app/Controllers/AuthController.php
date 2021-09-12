<?php

namespace App\Controllers;

/**
 *
 */
class AuthController
{

  function __construct()
  {
    // code...
  }

  public function index($params){
      $data = extract($params) ?? [];
      return view('home',$data);
  }
}
