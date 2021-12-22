<?php

namespace ScadaUnity\Framework\Log;

/**
 *
 */
class Logger
{
  /**
   * Mapeamento dos loggers
   * @var array
   */
  private static $map = [];

  /**
   * Mapeamento de loggers que serão carregados em todas as rotas
   * @var array
   */
  private static $default = [];

  /**
   * Fila de loggers
   * @var array
   */
  private $loggers = [];

  public function __construct(){
    //dd(self::$map);
  }

  /**
   * Metodo responsavel por executar o proximo nivel da fila de loggers
   * @param  Request  $request
   * @return Response
   */
  public function next($request){

    // Verifica se a fila esta vazia
    if (empty($this->loggers)) return ;

    // Pega o logger e remove do array de mapeamento
    $logger = array_shift($this->loggers);

    // Verifica o Mapeamento
    if (!isset(self::$map[$logger])) {
      throw new \Exception('Logger não encontrado', 500);

    }

    // Gerencia a Fila
    $queue = $this;
    $next = function($request) use($queue){
      return $queue->next($request);
    };

    // Executa o logger
    return (new self::$map[$logger])->handle($request,$next);
  }

  /**
   * Metodo responsavel por definir o mapeamento de loggers padrão
   * @param [type] $default
   */
  public static function setDefault($default){
    self::$default = $default;
  }

  /**
   * Metodo responsavel por definir o mapeamento de loggers
   * @param array $map
   */
  public static function setMap($map){
    self::$map = $map;
  }
}
