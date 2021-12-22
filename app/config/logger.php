<?php

use ScadaUnity\Framework\Log\Logger;

// Registra um logger no mapeamento.
Logger::setMap([
  'file' => \ScadaUnity\Framework\Log\FileHandler::class,
]);
