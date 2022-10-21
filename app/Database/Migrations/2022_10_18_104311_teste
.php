<?php

namespace App\Database\Migrations;

use ScadaUnity\Framework\Database\Forge;

return new class
{
  /**
   * Metodo responsavel por executar a migração.
   *
   * @return void
   */
  public function up()
  {
    echo "Migratio teste UP";
  }

  /**
   * Metodo responsavel por reverter a migração.
   *
   * @return void
   */
  public function down()
  {
    echo "Migratio teste DOWN";
  }

}
