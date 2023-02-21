<?php

namespace App\Controllers;

use ScadaUnity\Database\Schema;
use ScadaUnity\Database\Table;

class MigrationsController
{
  /**
   * Metodo responsavel por listar todos os registros.
   *
   * @return \ScadaUnity\Http\Response
   */
  public function index()
  { 
    
    $data = [
      'tables'=> Schema::all(),
    ];
    
    view('template/header',$data);
    view('components/Navbar',$data);
    view('migration',$data);
    echo "<h1>Migrations</h1><br>";
    echo '<a href="migration/up">Up</a><br>';
    echo "<a href='migration/down'>Down</a><br>";
    //Schema::all();

  }

  public function up()
  {

    Schema::create('teste',function(){
      Table::id();
      Table::string('name',10);
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
