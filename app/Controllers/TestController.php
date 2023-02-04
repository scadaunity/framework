<?php

namespace App\Controllers;

use ScadaUnity\Framework\Http\Request;
use ScadaUnity\Framework\View\View;

class TestController
{
  /**
   * Metodo responsavel por listar todos os registros.
   *
   * @return \ScadaUnity\Framework\Http\Response
   */
  public function index()
  {
    View::render('render.vsute');
  }

  
}
