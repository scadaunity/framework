<?php

namespace App\Controllers;

use ScadaUnity\Framework\Http\Request;

class RequestController
{
  /**
   * Metodo responsavel por exibir o formulario.
   *
   * @return \ScadaUnity\Framework\Http\Response
   */
  public function index()
  {
    view('pages/request/form');
  }

  public function save(){
    //Cria a instancia do objeto
    $request = new Request();
    dd($request->csrf);
  }

  
}
