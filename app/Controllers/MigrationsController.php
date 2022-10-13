<?php

namespace App\Controllers;

use ScadaUnity\Framework\Database\Schema;
use ScadaUnity\Framework\Database\Types as table;

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
    echo '<a href="migration/up">Up</a><br>';
    echo "<a href='migration/down'>Down</a><br>";
    Schema::all();

  }

  public function up()
  {

    Schema::create('teste',function(){
      table::id();
      table::string('name',10);
    });

    redirect('/migration');

  }

  public function down()
  {
    Schema::dropIfExists('teste');
    Schema::dropIfExists('users');
    Schema::dropIfExists('atempt');
    redirect('/migration');

  }

}
