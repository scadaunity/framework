<?php

use ScadaUnity\Framework\Log\Handler\FileHandler;
use ScadaUnity\Framework\Log\Log;

$log = new Log();

// Adiciona um Canal de Envio
$log::addChannel('web',new FileHandler('/Storage/Log/web.txt','DEBUG'));


