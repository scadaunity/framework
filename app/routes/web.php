<?php

use Core\Http\Router;

Router::get('/', 'AuthController@login');

Router::get('/home', 'HomeController@index');

/** -------------------- AUTH RESOURCE ----------------------- */
Router::get('/login','AuthController@login');
Router::get('/logout','AuthController@logout');
Router::post('/autenticate','AuthController@autenticate');


Router::resources([
  'users' => 'UserController',
]);
