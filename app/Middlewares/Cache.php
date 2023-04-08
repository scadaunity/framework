<?php

namespace App\Middlewares;

class Cache{

  /**
   * Metodo responsavel por executar o middleware
   * @param  Request $request
   * @param  Closure $next
   * @return Response
   */
  public function handle($request,$next){

    return $next($request);
  }
}
