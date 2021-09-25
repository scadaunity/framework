<?php

namespace Core;

/**
 *
 */
class Env
{

  /**
   * Metodo responsavel por carregar o arquivo externo com as variaveis de ambiente
   * @param  string $dir
   */
  public static function load($dir = ROOT)
  {
    //dd($dir);
    // VERIFICA SE O ARQUIVO EXISTE
    if (!file_exists($dir.'/.env')) {
      return false;
    }

    //CARREGA AS VARIAVEIS DE AMBIENTE
    $lines = file($dir.'/.env');

    $variaveis = [];

    // ITERA AS LINHAS DO ARQUIVO
    foreach ($lines as $line) {
      // CRIA UM ARRAY DE CHAVE E VALOR
      $arrayLine = explode('=', $line);
      if (count($arrayLine) == 2) {
        putenv($arrayLine[0].'='.$arrayLine[1]);
      }
    }
    

  }
}
