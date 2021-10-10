<?php

namespace App\Controllers;

/**
 *
 */
class HomeController
{

  function __construct()
  {
    
  }

  public function index(){
      $data = [
        'name' => 'Doug funny',
        'email' => 'scadaunity@gmail.com'
      ];
      return view('home',$data);
  }

  public function admin(){
    echo "Admin";
  }
}
