<?php

namespace App\Controllers;

use ScadaUnity\Http\Request;
use ScadaUnity\View\View;

class TesteController
{
  /**
   * Metodo responsavel por listar todos os registros.
   *
   * @return \ScadaUnity\Http\Response
   */
  public function index()
  {
    $data = [
      'title' => 'TesteController@index do doug',
    ];
    echo View::render('teste/index',$data);
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
   * @param \App\Models\Teste $teste
   * @return \ScadaUnity\Http\Response
   */
  public function store(Request $request, Teste $teste)
  {
    //
  }

  /**
   * Metodo responsavel por exibir um registro especifico.
   *
   * @param \App\Models\Teste
   * @return \ScadaUnity\Http\Response
   */
  public function show(Teste $teste)
  {
    //
  }
  /**
   * Metodo responsavel por exibir o formulario de edição de um registro.
   *
   * @param \App\Models\Teste
   * @return \ScadaUnity\Http\Response
   */
  public function edit(Teste $teste)
  {
    //
  }
  /**
   * Metodo responsavel por alterar um registro.
   *
   * @param \ScadaUnity\Http\Request $request
   * @param \App\Models\Teste $teste
   * @return \ScadaUnity\Http\Response
   */
  public function update(Request $request, Teste $teste)
  {
    //
  }
  /**
   * Metodo responsavel por excluir um registro.
   *
   * @param \App\Models\Teste
   * @return \ScadaUnity\Http\Response
   */
  public function destroy(Teste $teste)
  {
    //
  }
}
