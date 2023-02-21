<?php

namespace App\Controllers;

use ScadaUnity\Http\Request;

class Component
{
  /**
   * Metodo responsavel por listar todos os registros.
   *
   * @return \ScadaUnity\Framework\Http\Response
   */
  public function index()
  {
    
    view('template/header');
    //view('components/Navbar');
    view('components/buttons/AppStore',['link'=>'http://google.com','text'=>'Disponivel na']);
    view('components/buttons/PlayStore');
    view('template/footer');
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

  public function template(){
    return view('layouts/main');
  }
}
