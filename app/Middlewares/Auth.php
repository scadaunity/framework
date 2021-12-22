<?php

namespace App\Middlewares;
use ScadaUnity\Framework\Http\Request;

/**
 * Classe responsavel por verificar os dados do usuarios autenticado
 */
class Auth
{

  /**
   * Metodo responsavel por executar o middleware
   * @param  Request $request
   * @param  Closure $next
   * @return Response
   */
  public function handle($request,$next){

    // Verifica se o usuario esta logado
    if (isset($_SESSION[LOGGED])) {

    }

    return $next($request);
  }

}
