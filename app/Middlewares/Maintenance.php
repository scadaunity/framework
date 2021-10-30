<?php

namespace App\Middlewares;

class Maintenance{

  /**
   * Metodo responsavel por executar o middleware
   * @param  Request $request
   * @param  Closure $next
   * @return Response
   */
  public function handle($request,$next){

    // Verifica o estado de manutenção da pagina
    if (getenv('MAINTENANCE') == 'true') {
      throw new \Exception("Pagina em manutenção. Por favor tente novamente mais tarde", 200);
    }

    return $next($request);
  }
}
