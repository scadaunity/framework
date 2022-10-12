<?php

namespace App\Controllers;

use ScadaUnity\Framework\Database\Schema;

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
    Schema::all();

  }

  public function up()
  {
    $forge = new Schema();
    $forge->table('atempt');
    $forge->id();
    $forge->string('name',70);
    $forge->string('email',50);
    $forge->create();

    redirect('/migrations');

  }

  public function down()
  {
    Schema::dropIfExists('atempt');
    redirect('/migrations');

  }

}
