<?php

namespace ScadaUnity\Framework\;

/**
 *
 */
class App
{
  /**
   * Indica a versão do framework
   * @var string
   */
  public $version = '1.0.0';

  public function __construct(){

  }

  /**
   * Metodo responsavel por montar a aplicação
   * @return [type]
   */
  private function mount(){
    $this->config['app'] = include('../app/config/app.php');
  }

  private function config(){
      $this->config['app'] = include('../app/config/app.php');
  }

}
