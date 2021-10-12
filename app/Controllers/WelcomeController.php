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
      echo view('template/header');
      echo view('template/navbar');
      echo view('welcome',$data);
      echo view('template/footer');
  }
}
