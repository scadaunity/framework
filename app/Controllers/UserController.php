<?php

namespace App\Controllers;

use ScadaUnity\Database\QueryBuilder;
use ScadaUnity\Http\Request;
use ScadaUnity\Http\Response;
use App\Models\UserModel;

/**
 * Classe responsavel pelo usuarios
 */
class UserController
{
  protected $userModel;

  function __construct()
  {
    /** VERIFICA SE O USUARIO ESTA LOGADO */
    if (!logged()) { return redirectWithFlash('/login','message','Conteudo apenas para usuarios logados;');}

    $this->userModel = new UserModel();
  }

  /**
   * Exibe a lista de todos os registros
   * Verbo: GET
   * URI: /users
   * Action: index
   * Name: users.index
   * @return view
   */
  public function index()
  {
    $data = [
      'title' => 'Usuarios',
      'users' => $this->userModel->all()
    ];
    return view('/user/users',$data,'navbar');
  }

  /**
   * Exibe a view para criar um novo registro no banco de dados
   * Verbo: GET
   * URI: /users/create
   * Action: create
   * Name: users.create
   * @return view
   */
  public function create(){
    $data = [
      'title' => 'Novo usuario',
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

    $data = [
      'title' => 'Usuarios',
      'user' => $this->userModel->find($params['users']),
    ];

    if ($data['user'] == null) {
      echo 'registro não encontrado';
      exit;
    }

    return view('/user/user',$data);
  }
}
