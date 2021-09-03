<?php

namespace Core\Router;

/**
 * storage em retrieve routes
 * @author Paulo César Andrade Souza>
 * @version 1.0.0
 */
 class Routes
 {
    public static $routesList = array(
      'get' => [],
      'post' => [],
      'put' => [],
      'delete' => [],
    );


    /**
    * Store a new route into collection routesList
    *
    * @var string $request_type Type of method
    * @var string $uri The name of route
    * @var string $action The controller and method separate by @
    */
    public function add($request_method, $uri, $action)
    {

       switch($request_method)
       {
          case 'get':
            return $this->store('get',$uri, $action);
            break;
          case 'post':
            return $this->store('post',$uri, $action);
            break;
          case 'put':
            return $this->store('put',$uri, $action);
            break;
          case 'delete':
            return $this->store('delete',$uri, $action);
            break;
          default:
            throw new \Exception('Tipo de requisição não implementado');
       }
    }

    protected function store($request_method,$uri, $action){
        $collection = self::$routesList[$request_method][$uri]=$action;
    }



 }
