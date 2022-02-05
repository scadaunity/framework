<?php

namespace App\Controllers;

use ScadaUnity\Framework\Database\Forge;

class LayoutController
{
  /**
   * Metodo responsavel por listar todos os registros.
   *
   * @return \ScadaUnity\Http\Response
   */
  public function index()
  {
    $forge = new Forge();
    $forge->table('atempt');
    $forge->id();
    $forge->string('name',35);
    $forge->string('email',50);
    $forge->create();

  }

}
