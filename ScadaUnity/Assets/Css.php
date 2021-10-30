<?php

namespace ScadaUnity\Assets;

/**
 *
 */
class Css
{
  /**
   * Caminho dos arquivos css;
   * @var string
   */
  private static $cssPath = '';

  /**
   * Caminho do arquivo minificado final
   * @var string
   */
  private $outputPath = '';

  private static $files =[];

  /**
   * Metodo construtor da classe
   */
  function __construct()
  {

  }

  public static function add($file){
    self::$files[] = $file;
    return self::$files;
  }
}
