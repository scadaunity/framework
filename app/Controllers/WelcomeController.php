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
      layout('pages/welcome',$data,'main');
  }
}
