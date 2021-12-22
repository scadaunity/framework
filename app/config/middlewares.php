<?php

use ScadaUnity\Framework\Http\Middleware;

// Registra um middleware no mapeamento.
Middleware::setMap([
  'maintenance' => \App\Middlewares\Maintenance::class,
  'auth' => \App\Middlewares\Auth::class,
]);

// Define os middlewares padroes (Executados em todas as rotas)
Middleware::setDefault([
  'maintenance',
  'auth'
]);
