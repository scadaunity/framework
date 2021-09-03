<?php

namespace Core\Router;

use Core\Router\Request;
use Core\Router\Response;

/**
 * Router class map all request and resolve
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
    * Indice de rotas
    * @var array
    */
  private $routes = [];

  /**
    * Instancia de request
    * @var Request
    */
  private $request;

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

      $this->response = new Response;
      $this->request = new Request;
      $this->url = $url;
  }

    /** Criar rota do tipo GET
    * @param string $uri nome da rota
    * @param string $action controller e o metodo
    */
    public static function get(string $uri, $action)
    {


    }

    /** Criar rota do tipo POST*/
    public static function post(string $uri, $action)
    {
        self::$routes->add('post', $uri, $action);
    }

    /** Criar rota do tipo PUT*/
    public static function put($uri, $action)
    {
        self::$routes->add('put', $uri, $action);
    }

    /** Criar rota do tipo DELETE*/
    public static function delete($uri, $action)
    {
        self::$routes->add('delete', $uri, $action);
    }

    /** Dispacha a requisição ao cliente*/
    protected static function dispach($route, $namespace = "App\\controllers"){
      return self::$response->dispach($route->callback, $route->uri, $namespace);
    }

    /** Verifica se a uri existe no arquivo de rotas
    *
    * @param string $uri nome da rota
    *
    * @param string $routes array contendo as rotas
    *
    * @return array $route
    */

    public static function matchUri($uri,$routes){
      if(array_key_exists($uri, $routes)){
        return [$uri => $routes[$uri]];
      }
      return [];
    }

    public static function checkUri($uri,$route){
        echo "rota não encontrada";
    }

    public static function resolve(){
        /** recupera a uri da requisição **/
        $uri = self::$request->uri();
        /** buscas as rotas pelo methodo da requisição*/
        $routes = self::$routes::$routesList[self::$request->method()];

        /** Procura por rota exata **/
        //$matchedUri = self::matchUri($uri, $routes);

        /** Verifica se a rota exata foi encontrada **/
        /*if (!empty($matchedUri)) {
          dd($matchedUri);
        }*/

        array_filter(
          $routes,
          function($value){
            $regex = str_replace('/', '\/', ltrim($value,'/' ));
            var_dump($regex);
          },
          ARRAY_FILTER_USE_KEY
        );

        echo"A rota não existe {" . $uri . "}";
    }
}
