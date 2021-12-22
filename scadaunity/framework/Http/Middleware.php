<?php

namespace ScadaUnity\Framework\Http;

/**
 *
 */
class Middleware
{
  /**
   * Mapeamento dos middlewares
   * @var array
   */
  public static $map = [];

  /**
   * Mapeamento de middlewares que serão carregados em todas as rotas
   * @var array
   */
  private static $default = [];

  /**
   * Fila de middlewares
   * @var array
   */
  private $middlewares = [];

  /**
   * Função de execução do controlador
   * @var [type]
   */
  private $controller;

  /**
   * Argumentos do controlador
   * @var array
   */
  private $params = [];

  public function __construct($middlewares,$controller,$params){
    $this->middlewares = array_merge(self::$default,$middlewares);
    $this->controller = $controller;
    $this->params = $params;
  }

  /**
   * Metodo responsavel por executar o proximo nivel da fila de middlewares
   * @param  Request  $request
   * @return Response
   */
  public function next($request){

    // Verifica se a fila esta vazia
    if (empty($this->middlewares)) return controller($this->controller,$this->params);

    // Pega o middleware e remove do array de mapeamento
    $middleware = array_shift($this->middlewares);

    // Verifica o Mapeamento
    if (!isset(self::$map[$middleware])) {
      throw new \Exception("Middleware não encontrado", 500);

    }

    // Gerencia a Fila
    $queue = $this;
    $next = function($request) use($queue){
      return $queue->next($request);
    };

    // Executa o middleware
    return (new self::$map[$middleware])->handle($request,$next);
  }

  /**
   * Metodo responsavel por definir o mapeamento de middlewares padrão
   * @param [type] $default
   */
  public static function setDefault($default){
    self::$default = $default;
  }

  /**
   * Metodo responsavel por definir o mapeamento de middlewares
   * @param array $map
   */
  public static function setMap($map){
    self::$map = $map;
  }
}
