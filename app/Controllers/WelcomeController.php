<?php

namespace App\Controllers;

/**
 *
 */
class WelcomeController
{

  public function index(){
    $data =[
      'name' => 'teste',
    ];
    layout('pages/welcome',$data,'main');
  }

  public function home(){
    $data =[
      'name' => 'teste',
    ];
    //layout('pages/home',$data,'main');
    layout('pages/auth/mail/verification',$data,'main');
  }

  public function dashboard(){
    $data =[
      'name' => 'teste',
    ];
    layout('pages/dashboard',$data,'main');
  }

  public function template(){
    $data =[
      'name' => 'teste',
    ];
    layout('pages/dashboard',$data,'main');
  }

}
