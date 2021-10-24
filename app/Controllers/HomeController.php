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
        'email' => 'scadaunity@gmail.com'
      ];

      render('template/header',$data);
      render('template/navbar',$data);
      render('home',$data);
      render('template/footer',$data);


  }
}
