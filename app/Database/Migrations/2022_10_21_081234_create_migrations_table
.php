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
    Schema::create('migrations',function(){
      Table::id();
      Table::string('migration');
      Table::int('bath');
    });
  }

  /**
   * Metodo responsavel por reverter a migração.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('migrations');
  }

};
