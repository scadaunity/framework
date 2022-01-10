<?php

namespace App\Controllers;

use ScadaUnity\Framework\Http\Request;
use ScadaUnity\Framework\Suport\Auth;

class MoneyAccountController
{

  /**
   * Metodo responsavel por listar todos os registros.
   *
   * @return \ScadaUnity\Framework\Http\Response
   */
  public function index()
  {
    if (Auth::check() === true) {
        return view('pages/money/accounts');
    } else {
        redirectWithFlash('/login','notLogged','Area restrita faça o login');
    }

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
   * @param \ScadaUnity\Framework\Http\Request $request
   * @param \App\Models\MoneyAccount $moneyaccount
   * @return \ScadaUnity\Framework\Http\Response
   */
  public function store()
  {
    $request = new Request();
    dd($request->post());
  }

  /**
   * Metodo responsavel por exibir um registro especifico.
   *
   * @param \App\Models\MoneyAccount
   * @return \ScadaUnity\Http\Response
   */
  public function show(MoneyAccount $moneyaccount)
  {
    //
  }
  /**
   * Metodo responsavel por exibir o formulario de edição de um registro.
   *
   * @param \App\Models\MoneyAccount
   * @return \ScadaUnity\Http\Response
   */
  public function edit(MoneyAccount $moneyaccount)
  {
    //
  }
  /**
   * Metodo responsavel por alterar um registro.
   *
   * @param \ScadaUnity\Http\Request $request
   * @param \App\Models\MoneyAccount $moneyaccount
   * @return \ScadaUnity\Http\Response
   */
  public function update(Request $request, MoneyAccount $moneyaccount)
  {
    //
  }
  /**
   * Metodo responsavel por excluir um registro.
   *
   * @param \App\Models\MoneyAccount
   * @return \ScadaUnity\Http\Response
   */
  public function destroy(MoneyAccount $moneyaccount)
  {
    //
  }
}
