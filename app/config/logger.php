<?php

use ScadaUnity\Log\Logger;

// Registra um logger no mapeamento.
Logger::setMap([
  'file' => \ScadaUnity\Log\FileHandler::class,
]);
