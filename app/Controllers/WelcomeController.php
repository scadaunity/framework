<?php

namespace App\Controllers;

/**
 *
 */
class WelcomeController
{

  function __construct()
  {
    // code...
  }

  public function index($params){
      $data =[
        'name' => 'teste',
      ];
      echo view('welcome',$data);
  }
}
