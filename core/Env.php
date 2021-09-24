<?php

namespace Core\Env;

/**
 *
 */
class Env
{

  /**
   * Metodo responsavel por carregar o arquivo externo com as variaveis de ambiente
   * @param  string $dir
   */
  private static function load($dir)
  {
    // VERIFICA SE O ARQUIVO EXISTE
    if (!file_exists($dir.'/.env')) {
      return false;
    }

    //CARREGA AS VARIAVEIS DE AMBIENTE
    $lines = file($dir.'/.env');

    dd($lines);
  }

  function __construct()
  {
    // code...
  }
}
