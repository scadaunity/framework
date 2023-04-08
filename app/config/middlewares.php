<?php

use ScadaUnity\Http\Middleware;

/**
 * Registra um middleware no mapeamento.
 */
Middleware::setMap([
  'maintenance' => \App\Middlewares\Maintenance::class,
  'auth'        => \App\Middlewares\Auth::class,
  'cache'       => \App\Middlewares\Cache::class
]);

/**
 * Define os middlewares que serão executados em todas as rotas
 */
Middleware::setDefault([
  'maintenance',
  'auth',
  'cache'
]);
