<?php

namespace App\Controllers;

use ScadaUnity\Framework\Database\Forge;

class MigrationsController
{
  /**
   * Metodo responsavel por listar todos os registros.
   *
   * @return \ScadaUnity\Http\Response
   */
  public function index()
  {
    echo "<h1>Migrations</h1><br>";
    echo "<a href='http://localhost/framework/public/migrations/up'>Up</a><br>";
    echo "<a href='http://localhost/framework/public/migrations/down'>Down</a><br>";
    Forge::all();

  }

  public function up()
  {
    $forge = new Forge();
    $forge->table('atempt');
    $forge->id();
    $forge->string('name',35);
    $forge->string('email',50);
    $forge->create();

    redirect('/migrations');

  }

  public function down()
  {
    Forge::dropIfExists('atempt');
    redirect('/migrations');

  }

}
