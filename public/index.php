<?php
use ScadaUnity\App;
use ScadaUnity\Log\Logger;

/** Carrega o autoload do composer */
require_once '../vendor/autoload.php';

/* Carrega as configurações da aplicação */
require_once '../ScadaUnity/bootstrap.php';




try {
  $router->run();
} catch (\Exception $e) {
  dd($e->getMessage());
}
