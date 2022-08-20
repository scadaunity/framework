<?php

namespace ScadaUnity\Framework;

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

  public $config = '';

  public function __construct(){
      $this->config();
  }

  /**
   * Metodo responsavel por montar a aplicação
   * @return [type]
   */
  public function mount(){
    $this->config['app'] = include('../app/config/app.php');
  }

  private function config(){
      echo 'carregando configuração'.PHP_EOL;
      echo ''.PHP_EOL;
  }

}
