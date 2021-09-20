<?php

namespace App\Controllers;

use Core\Database\QueryBuilder;
use Core\Http\Request;
use Core\Http\Response;
use App\Models\UserModel;


/**
 *
 */
class UserController
{
  protected $model;

  function __construct()
  {
    $this->model = new UserModel();
  }

  /**
   * Exibe a lista de todos os registros
   * Verbo: GET
   * URI: /users
   * Action: index
   * Name: users.index
   * @param  array $params
   * @return view
   */
  public function index($params){
    //$model = new UserModel();
    //dd($model);

    $db = new QueryBuilder();
    $data = [
      'title' => 'Usuarios',
      'users' => $db->find('users'),
    ];
    return view('/user/users',$data);
  }

  /**
   * Exibe o formulario para criar um novo registro no banco de dados
   * Verbo: GET
   * URI: /users/create
   * Action: create
   * Name: users.create
   * @param  array $params
   * @return view
   */
  public function create($params){
    $data = [
      'title' => 'Novo usuario',
      'data' => $params,
    ];
    return view('/user/create',$data);

  }

  /**
   * Salva um registro no banco de dados
   * Verbo: POST
   * URI: /users
   * Action: store
   * Name: users.store
   * @param  Request
   * @return view
   */

  public function store(){
    $request = new Request();
    $db = new QueryBuilder();

    /** Verifica se existe parametros da URI*/
    d($request->post());

      $data = extract($request->post()) ?? [];
      d($data);


    //dd($request->post());
  }

  /**
   * Exibe um registro no banco de dados
   * Verbo: GET
   * URI: /users/{user}
   * Action: show
   * Name: users.show
   * @param  Request
   * @param  array $params
   * @return view
   */

  public function show($params){

    $db = new QueryBuilder();
    $data = [
      'title' => 'Usuarios',
      'user' => $db->find('users',1),
    ];

    return view('/user/user',$data);
  }
}
