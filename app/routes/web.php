<?php

use Core\Http\Router;

Router::get('/', 'HomeController@index');

/** -------------------- USER RESOURCE ----------------------- */
Router::resource('/users','UserController');

Router::resources([
  'user' => 'UserController',
  'auth' => 'AuthController',
]);
