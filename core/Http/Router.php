<?php

namespace Core\Http;

use Core\Http\Request;
use Core\Http\Response;

/**
 * Classe responsavel por adicionar rotas e redirecionar todo o fluxo da aplicação
 */

class Router
{
  /**
    * URL completa do projeto (raiz)
    * @var string
    */
  private $url = '';

  /**
    * Prefixo de todas as rotas
    * @var string
    */
  private $prefix = '';

  /**
    * Diretorio dos controllers
    * @var string
    */
  private $controllers = '';

  /**
    * Indice de rotas
    * @var array
    */
  private static $routes;

  /**
    * Instancia de request
    * @var Request
    */
  public $request;

  /**
    * Instancia de response
    * @var Response
    */
  public $response;

  /**
    * Construtor da classe
    * @param string $url
    */
  public function __construct($url = '')
  {

      $this->response = new Response(200,'ola mundo');
      $this->request = new Request();
      $this->url = $url;
      $this->controllers =$url .'/app/controllers';
      $this->setPrefix();
  }

  /**
    * Metodo responsavel por definir o prefixo das rotas
    * @param string $url
    */
  private function setPrefix()
  {
    $parseUrl = parse_url($this->url);
    $this->prefix = $parseUrl['port'] ?? '';
  }

  /** Metodo responsavel por adicionar uma rota na classe
    * @param string $method
    * @param string $route
    * @param string $action
    */
  private static function addRoute($method, $route, $action)
  {
    self::$routes[$method][$route]=$action;

  }

  /** Metodo responsavel por criar uma rota do tipo GET
    * @param string $route
    * @param string $action
    */
  public static function get($route, $action)
  {
    self::addRoute('get', $route , $action);

  }

  /** Metodo responsavel por criar uma rota do tipo POST
    * @param string $route
    * @param string $action
    */
  public static function post($route, $action)
  {
    self::addRoute('post', $route , $action);

  }

  /** Metodo responsavel por criar uma rota do tipo PUT
    * @param string $route
    * @param string $action
    */
  public static function put($route, $action)
  {

    self::addRoute('put', $route , $action);

  }

  /** Metodo responsavel por criar uma rota do tipo DELETE
    * @param string $route
    * @param string $action
    */
  public static function delete($route, $action)
  {

    self::addRoute('DELETE', $route , $action);

  }

  /** Metodo responsavel por retornar as rotas
    * @param string $method
    * @return array
    */
  public function routes($method = '')
  {
    if (!empty($method)) {
      switch($method)
       {
          case 'get':
            return self::$routes[$method];
            break;
          case 'post':
            return self::$routes[$method];
            break;
          case 'put':
            return self::$routes[$method];
            break;
          case 'delete':
            return self::$routes[$method];
            break;
          default:
            throw new \Exception('Metodo não permitido [' . $method .']',405);
       }
    }
    return self::$routes;

  }

    /** Metodo responsavel por localizar uma rota exata
      * @param string $uri
      * @param array $routes
      * @return array $route
      */
    public function matchExactUri($uri,$routes){
      if(array_key_exists($uri, $routes)){
        return [$uri => $routes[$uri]];
      }
      return [];
    }

    /** Metodo responsavel por localizar uma rota dinamica
      * @param string $uri
      * @param array $routes
      * @return array $route
      */

    public function matchDinamicUri($uri,$routes){
      return array_filter(
        $routes,
        function($value) use($uri){
          $pattern = str_replace('/', '\/', ltrim($value , '/'));
          return preg_match("/^$pattern$/",ltrim($uri , '/'));
          var_dump($pattern);
        },
        ARRAY_FILTER_USE_KEY
      );
    }

    /** Metodo responsavel por recuperar os parametros da URI
      *
      * @param array $uri
      * @param array $matchedUri
      *
      * @return array
      */

    public function params($uri, $matchedUri){
      if (!empty($matchedUri)) {
        $getParams = array_keys($matchedUri)[0];
        return array_diff(
          $uri,
          explode('/',ltrim($getParams,'/')),
        );
      }
      return [];
    }

    /** Metodo responsavel por formatar os parametros da URI
      *
      * @param array $uri
      * @param array $params
      *
      * @return array $data
      */

    public function formatParams($uri, $params){

      $data = [];
      foreach ($params as $index => $param) {
        $data[$uri[$index - 1]] = $param;
      }

      return $data;
    }


    /**
     * Metodo responsavel por executar a rota atual
     * @return Response
     */
    public function run(){
        /** recupera a uri da requisição **/
        $uri = $this->request->uri();

        /** recupera o metodo da requisição **/
        $method = $this->request->method();

        /** recupera as rotas atraves do metodo*/
        $routes = self::$routes[$method];
        //dd($routes);



        /** Procura por rota exata **/
        $matchedUri = self::matchExactUri($uri, $routes);

        $params = [];

        if (empty($matchedUri)) {
          /** Procura a rota dinamica **/
          $matchedUri = self::matchDinamicUri($uri, $routes);
          $uri = explode('/',ltrim($uri,'/'));
              /** recupera os parametros da uri **/
              $params = $this->params($uri,$matchedUri);
              $params = $this->formatParams($uri, $params);
        }

        if(!empty($matchedUri)){
          controller($matchedUri, $params);
          return;
        }

        throw new \Exception("Algo deu errado",500);

    }
}