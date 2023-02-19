<?php

namespace ScadaUnity\Framework\Log;

/**
 * Classe responsavel pelos eventos de log
 */

class Log
{
  /**
   * Define os niveis de log
   * @var array
   */
  public static $levels = [
    'DEBUG'     => 100,
    'INFO'      => 200,
    'NOTICE'    => 300,
    'WARNING'   => 400,
    'ERROR'     => 500,
    'CRITICAL'  => 600,
    'ALERT'     => 700,
    'EMERGENCY' => 800,
  ];

  /**
   * Armazena os canais de envio
   * @var [type]
   */
  public static $channels = [];

  /**
   * Armazena os logs
   * @var array
   */
  public static $logs = [];

  public function __construct()
  {
    
  }

  public function debug(string|\Stringable $message, array $context = []): void
  {

  }
  public function info(string|\Stringable $message, array $context = []): void
  {

  }
  public function notice(string|\Stringable $message, array $context = []): void
  {

  }
  public function warning(string|\Stringable $message, array $context = []): void
  {

  }
  public function error(string|\Stringable $message, array $context = []): void
  {

  }
  public function critical(string|\Stringable $message, array $context = []): void
  {

  }
  public function alert(string|\Stringable $message, array $context = []): void
  {

  }
  public function emergency(string|\Stringable $message, array $context = []): void
  {

  }
  public function log($level, string|\Stringable $message, array $context = []): void{

  }

  public static function addLevel($level,$value){
    self::$levels[$level] = $value;
  }

  /**
   * Metodo responsavel por mapear os canais de envio
   * @param string $channel Nome do canal
   */
  public static function addChannel($channel,$handler){
    self::$channels[$channel] = $handler;
  }

  /**
   * Adiciona um registro no log
   */
  public static function addLog(string $message, string $level)
  {
    $data = [
      
    ];
  }

}
