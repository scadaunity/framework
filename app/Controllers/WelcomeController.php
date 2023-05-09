<?php

namespace App\Controllers;
use ScadaUnity\View\Template;

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
    layout('pages/home',$data,'main');
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
      'user'=>'doug',
    ];
    
    Template::render('render',$data);
  }

}
