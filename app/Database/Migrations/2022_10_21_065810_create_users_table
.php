<?php

namespace App\Database\Migrations;

use ScadaUnity\Database\Schema;
use ScadaUnity\Database\Table;

return new class
{
  /**
   * Metodo responsavel por executar a migração.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users',function(){
      Table::id();
      Table::string('name');
      Table::string('email');
      Table::string('password');
      Table::timestamps();
    });
  }

  /**
   * Metodo responsavel por reverter a migração.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }

};
