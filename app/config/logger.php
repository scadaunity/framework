<?php

use ScadaUnity\Framework\Log\Handler\FileHandler;
use ScadaUnity\Framework\Log\Logger;

$log = new Logger();

// Adiciona um Canal de Envio
$log::addChannel('web',new FileHandler('/Storage/Log/web.txt','DEBUG'));


