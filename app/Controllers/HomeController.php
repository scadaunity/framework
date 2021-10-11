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

      echo view('template/header');
      echo view('template/navbar');
      echo view('home',$data);
      echo view('template/footer');
  }
}
