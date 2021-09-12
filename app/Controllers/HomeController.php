<?php

namespace App\Controllers;

/**
 *
 */
class HomeController
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
