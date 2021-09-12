<?php

namespace App\Controllers;

/**
 *
 */
class UserController
{

  function __construct()
  {
    // code...
  }

  public function index($params){
    $data = [
      'title' => 'Usuarios',
      'users' => ['doug','stella','sofia','victoria'],
    ];
    return view('/user/user',$data);
  }

  public function create($params){
    $data = [
      'title' => 'Novo usuario',
      'data' => $params,
    ];
    return view('/user/create',$data);

  }
}
