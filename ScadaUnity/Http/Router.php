<?php

namespace ScadaUnity\Http;

use ScadaUnity\Http\Request;
use ScadaUnity\Http\Response;
use ScadaUnity\Http\Middleware;
use \Closure;

/**
 * Classe responsavel por adicionar rotas e redirecionar todo o fluxo da aplicação
 * Ultima atualização 16/09/21
 */

class Router
{
  /**
    * URL completa do projeto (raiz)
    * @var string
    */
  private $url = '';

  /**
    * Indice de rotas
    * @var array
    */
  public static $routes;

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
  public function __construct($url)
{
      $this->response = new Response(200,'scada unity');
      $this->request = new Request();
      $this->url = $url;
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
    self::addRoute('delete', $route , $action);
  }

  /** Metodo responsavel por criar um resource
    * @param string $route
    * @param string $action
    */
  public static function resource($route, $controller)
  {
    self::get($route , $controller.'@index');
    self::get($route.'/create' , $controller.'@create');
    self::post($route, $controller.'@store');
    self::get($route.'/[0-9]+' , $controller.'@show');
    self::get($route.'/[0-9]+/edit' , $controller.'@edit');
    self::put($route.'/[0-9]+' , $controller.'@update');
    self::delete($route.'/[0-9]+' , $controller.'@delete');
  }

  /** Metodo responsavel por criar varios resources
    * @param array $routes
    */
  public static function resources($routes)
  {
    foreach ($routes as $route => $controller) {
      self::resource($route,$controller);
    }
  }

  /** Metodo responsavel por redirecionar
    * @param string $url
    */
  public static function redirect($url)
  {
    return header('location:'.$url);
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
      return (array_key_exists($uri, $routes)) ? [$uri => $routes[$uri]] : [];
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
        },
        ARRAY_FILTER_USE_KEY
      );
    }

    /** Metodo responsavel por localizar uma rota exata
      * @param string $uri
      * @param array $routes
      * @return array $route
      */
    public function match($uri,$routes){


      return (array_key_exists($uri, $routes)) ? [$uri => $routes[$uri]] : [];
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
        try {
          /** recupera a uri da requisição **/
          $uri = $this->request->uri();

          /** recupera o metodo da requisição **/
          $method = $this->request->method();

          /** variavel responsavel por armazenar parametros da rota*/
          $params = [];

          /** recupera as rotas atraves do metodo*/
          $routes = self::$routes[$method];

          /** verifica se o metodo é do tipo get*/
          if ($method == 'get') {
            // Gera o token
            setToken();
          }

          /** Procura por rota exata **/
          $matchedUri = self::matchExactUri($uri, $routes);

          /** Procura a rota dinamica **/
          if (empty($matchedUri)) {

            $matchedUri = self::matchDinamicUri($uri, $routes);
            $uri = explode('/',ltrim($uri,'/'));

            /** recupera os parametros da uri **/
            $params = $this->params($uri,$matchedUri);
            $params = $this->formatParams($uri, $params);
          }

          /** Verifica se o metodo é do tipo post */
          if ($method == 'post') {

            /** verifica se foi passado o csrf token*/
            if (!isset($this->request->post()['_csrf'])) {
              throw new \Exception("Pagina expirada",419);
            }

            /** verifica se o token é valido */
            if (!$this->request->post()['_csrf'] == getToken()) {
              throw new \Exception("Pagina expirada",419);
            }

            /** cria os parametros do post*/
            $params = $this->request->post();
          }

          /** Executa os middlewares */
          if(!empty($matchedUri)){
            return (new Middleware([],$matchedUri,$params))->next($this->request);
          }

          throw new \Exception("Não foi possivel resolver a rota {$this->request->uri()}",500);
        } catch (\Exception $e) {
          dd($e->getMessage());
        }
    }
}
