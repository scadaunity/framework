<?php

use Core\Http\Router;

Router::get('/', 'AuthController@login');

/** -------------------- AUTH RESOURCE ----------------------- */
Router::get('/login','AuthController@login');
Router::post('/autenticate','AuthController@autenticate');


Router::resources([
  'users' => 'UserController',
]);
