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

      echo $this->template('home',$data);
  }

  private function template($view,$data){
    echo view('template/header');
    echo view('template/navbar');
    echo view($view,$data);
    echo view('template/footer');
  }
}
