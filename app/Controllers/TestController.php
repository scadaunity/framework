<?php

namespace App\Controllers;

use ScadaUnity\Http\Request;
use ScadaUnity\View\View;

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
