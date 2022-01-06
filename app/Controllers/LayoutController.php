<?php

namespace App\Controllers;

use ScadaUnity\Framework\Http\Request;
use ScadaUnity\Framework\View\View;

class LayoutController
{
  /**
   * Metodo responsavel por listar todos os registros.
   *
   * @return \ScadaUnity\Http\Response
   */
  public function index()
  {
    View::render('/layouts/main', ['teste'=>'doug']);
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
   * @param \App\Models\Component $component
   * @return \ScadaUnity\Http\Response
   */
  public function store(Request $request, Component $component)
  {
    //
  }

  /**
   * Metodo responsavel por exibir um registro especifico.
   *
   * @param \App\Models\Component
   * @return \ScadaUnity\Http\Response
   */
  public function show(Component $component)
  {
    //
  }
  /**
   * Metodo responsavel por exibir o formulario de edição de um registro.
   *
   * @param \App\Models\Component
   * @return \ScadaUnity\Http\Response
   */
  public function edit(Component $component)
  {
    //
  }
  /**
   * Metodo responsavel por alterar um registro.
   *
   * @param \ScadaUnity\Http\Request $request
   * @param \App\Models\Component $component
   * @return \ScadaUnity\Http\Response
   */
  public function update(Request $request, Component $component)
  {
    //
  }
  /**
   * Metodo responsavel por excluir um registro.
   *
   * @param \App\Models\Component
   * @return \ScadaUnity\Http\Response
   */
  public function destroy(Component $component)
  {
    //
  }
}
