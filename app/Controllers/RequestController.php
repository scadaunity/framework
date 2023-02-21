<?php

namespace App\Controllers;

use ScadaUnity\Http\Request;
use ScadaUnity\Log\Log;

class RequestController
{
  /**
   * Metodo responsavel por exibir o formulario.
   *
   * @return \ScadaUnity\Framework\Http\Response
   */
  public function index()
  {
    $log = new Log();
    dd($log);
  }

  public function save(){
    dd(Request::input('pass'));
  }

  
}
