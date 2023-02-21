<?php

use ScadaUnity\Log\Handler\FileHandler;
use ScadaUnity\Log\Log;

$log = new Log();

// Adiciona um Canal de Envio
$log::addChannel('web',new FileHandler('/Storage/Log/web.txt','DEBUG'));


