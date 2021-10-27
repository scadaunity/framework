<?php

namespace App\Controllers;

/**
 *
 */
class HomeController
{
  public function index(){

      $data = [
        'name' => 'Doug funny',
        'email' => 'scadaunity@gmail.com',
        'user' => true,
      ];

      view('template/header',$data);
      view('template/navbar',$data);
      view('home',$data);
      view('template/footer',$data);
  }
}
