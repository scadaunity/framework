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
      render('template/header');
      render('template/navbar');
      render('welcome',$data);
      render('template/footer');
  }
}
