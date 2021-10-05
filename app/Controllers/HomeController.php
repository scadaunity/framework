<?php

namespace App\Controllers;

/**
 *
 */
class HomeController
{

  function __construct()
  {
    /** VERIFICA SE O USUARIO ESTA LOGADO */
    if (!logged()) {
      setFlash('message','Pagina restrita, por favor faça o login');
      return redirect('/login');
    }
  }

  public function index($params){
      $data = extract($params) ?? [];
      return view('home',$data);
  }

  public function admin(){
    echo "Admin";
  }
}
