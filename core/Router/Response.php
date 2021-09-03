<?php

namespace Core\Router;

/**
 *
 */
 class Response
 {

     public function dispach($callback, $params = [], $namespace = "App\\controllers")
     {
       dd($callback);
         if(is_callable($callback))
         {
             return call_user_func_array($callback, array_values($params));

         } elseif (is_string($callback)) {

             if(!!strpos($callback, '@') !== false) {

                 $callback = explode('@', $callback);
                 $controller = $namespace.$callback[0];
                 $method = $callback[1];

                 $rc = new \ReflectionClass($controller);

                 if($rc->isInstantiable() && $rc->hasMethod($method))
                 {
                     return call_user_func_array(array(new $controller, $method), array_values($params));

                 } else {

                     throw new \Exception("Erro ao despachar: controller não pode ser instanciado, ou método não exite");
                 }
             }
         }
         throw new \Exception("Erro ao despachar: método não implementado");
     }

     public function view($view){
        //dd($view);
       require_once $view;
     }

     protected function notFound()
     {
         return header("HTTP/1.0 404 Not Found", true, 404);
     }
 }
