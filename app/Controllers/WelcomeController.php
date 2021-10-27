<?php

namespace App\Controllers;

/**
 *
 */
class WelcomeController
{

  public function index($params){
      $data =[
        'name' => 'teste',
      ];
      view('template/header');
      view('template/navbar');
      view('welcome',$data);
      view('template/footer');
  }
}
