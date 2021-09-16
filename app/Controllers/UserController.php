<?php

namespace App\Controllers;

use Core\Database\QueryBuilder;

/**
 *
 */
class UserController
{

  function __construct()
  {
    // code...
  }

  /**
   * Exibe a lista de todos os usuarios
   * @param  array $params
   * @return view
   */
  public function index($params){
    $db = new QueryBuilder();
    $data = [
      'title' => 'Usuarios',
      'users' => $db->find('users'),
    ];
    return view('/user/user',$data);
  }

  /**
   * Exibe a lista de todos os usuarios
   * @param  array $params
   * @return view
   */
  public function index($params){
    $db = new QueryBuilder();
    $data = [
      'title' => 'Usuarios',
      'users' => $db->find('users'),
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
