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

  /**
   * Metodo responsavel por exibir o formulario para criação de um novo registro.
   *
   * @return \ScadaUnity\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Metodo responsavel por inserir um novo registro no banco de dados.
   *
   * @param \ScadaUnity\Http\Request $request
   * @param \App\Models\Test $test
   * @return \ScadaUnity\Http\Response
   */
  public function store(Request $request, Test $test)
  {
    //
  }

  /**
   * Metodo responsavel por exibir um registro especifico.
   *
   * @param \App\Models\Test
   * @return \ScadaUnity\Http\Response
   */
  public function show(Test $test)
  {
    //
  }
  /**
   * Metodo responsavel por exibir o formulario de edição de um registro.
   *
   * @param \App\Models\Test
   * @return \ScadaUnity\Http\Response
   */
  public function edit(Test $test)
  {
    //
  }
  /**
   * Metodo responsavel por alterar um registro.
   *
   * @param \ScadaUnity\Http\Request $request
   * @param \App\Models\Test $test
   * @return \ScadaUnity\Http\Response
   */
  public function update(Request $request, Test $test)
  {
    //
  }
  /**
   * Metodo responsavel por excluir um registro.
   *
   * @param \App\Models\Test
   * @return \ScadaUnity\Http\Response
   */
  public function destroy(Test $test)
  {
    //
  }
}
