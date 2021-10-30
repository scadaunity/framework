<?php

use ScadaUnity\Http\Middleware\Queue as MiddlewareQueue;

// Registra um middleware no mapeamento.
MiddlewareQueue::setMap([
  'maintenance' => \App\Middlewares\Maintenance::class
]);

// Define os middlewares padroes (Executados em todas as rotas)
MiddlewareQueue::setDefault([
  'maintenance'
]);
