<?php

namespace ScadaUnity\Framework\Log\Handlers;

class FileHandler{

  /**
   * Metodo responsavel por executar o middleware
   * @param  Request $request
   * @param  Closure $next
   * @return Response
   */
  public function handle($next){

    d($next);
    return $next();
  }
}
