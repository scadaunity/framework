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
    * Variavel responsavel por armazenar o indice das rotas
    * @var array
    */
  public static $routes;

  /**
    * URL completa do projeto (raiz)
    * @var string
    */
  private $url = '';

  /**
    * URI da rota atual
    * @var string
    */
  private $uri = '';

  /**
    * Prefixo da uri
    * @var string
    */
  private $prefix = '';

  /**
    * Metodo da requisição atual da rota atual
    * @var string
    */
  private $method = '';

  /**
    * Parametros da rota atual
    * @var array
    */
  public $params = [];

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
      $this->uri = $this->request->uri();
      $this->method = $this->request->method();
      $this->url = $url;
      $this->setPrefix();
      $this->segments = explode('/',ltrim($this->getUri(),'/'));


  }

  private function getUri(){
    // pega a requisição atual
    $uri = $this->request->uri();

    // fatia a uri e remove o prefixo da rota
    $xUri = strlen($this->prefix) ? explode($this->prefix,$uri) : [$uri];

    // retorna a ultima posição do array da rota atual sem o prefixo
    return end($xUri);

  }

  private function setPrefix(){
      // Informações da Url atual
      $parseUrl = parse_url($this->url);
      $this->prefix = $parseUrl['path'] ?? '';
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

    /** Metodo responsavel por localizar a rota
      * @param string $uri
      * @param array $routes
      * @return array $route
      */
    public function match($uri,$routes){

      // Verifica se é uma rota exata
      if (array_key_exists($uri, $routes)) {
        return [$uri => $routes[$uri]];
      }

      // Verifica se é uma rota dinamica
      return array_filter(
        $routes,
        function($value) use($uri){
          $pattern = str_replace('/', '\/', ltrim($value , '/'));
          return preg_match("/^$pattern$/",ltrim($uri , '/'));
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

    public function params($matchedUri){

      if (!empty($matchedUri)) {
        $getParams = array_keys($matchedUri)[0];
        $this->params = array_diff($this->segments,explode('/',ltrim($getParams,'/')),);
      }

      if (!$this->params == []) {
        foreach ($this->params as $index => $param) {
          $this->params[$this->request->segments()[$index - 1]] = $param;
        }
      }
      return $this->params;
    }

    /**
     * Metodo responsavel por executar a rota atual
     * @return Response
     */
    public function run(){
        try {


          /** Gera o token se o metodo for do tipo GET*/
          /*if ($this->request->method() == 'get') {
            setToken();
          }*/

          /** Procura a rota **/
          $match = self::match($this->getUri(), self::$routes[$this->method]);

          /** recupera os parametros da uri **/
          $this->params = $this->params($match);

          /** Verifica se o metodo é do tipo post */
          if ($this->method == 'post') {

            /** verifica se foi passado o csrf token*/
            if (!isset($this->request->post()['_csrf'])) {
              throw new \Exception("Pagina expirada",419);
            }

            /** verifica se o token é valido */
            if (!$this->request->post()['_csrf'] == getToken()) {
              //throw new \Exception("Pagina expirada",419);
            }

            /** cria os parametros do post*/
            $this->params = $this->request->post();
          }

          /** Executa os middlewares */
          if(!empty($match)){
            return (new Middleware([],$match,$this->params))->next($this->request);
          }

          throw new \Exception("Não foi possivel resolver a rota {$this->request->uri()}",500);
        } catch (\Exception $e) {
          dd($e->getMessage());
        }
    }
}
