<?php

namespace ScadaUnity\Log;

/**
 * Classe responsavel pelos eventos de log
 */

class Logger
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

  public function debug(string|\Stringable $message, array $context = []): void{}
  public function info(string|\Stringable $message, array $context = []): void{}
  public function notice(string|\Stringable $message, array $context = []): void{}
  public function warning(string|\Stringable $message, array $context = []): void{}
  public function error(string|\Stringable $message, array $context = []): void{}
  public function critical(string|\Stringable $message, array $context = []): void{}
  public function alert(string|\Stringable $message, array $context = []): void{}
  public function emergency(string|\Stringable $message, array $context = []): void{}

  public function log($level, string|\Stringable $message, array $context = []): void{

  }

  public static function addLevel($level,$value){
    self::$levels[$level] = $value;
  }

  public static function addchannel($channel,$handler){
    self::$channels[$channel] = $handler;
  }

}
