<?php

use Core\Http\Router;

Router::get('/', 'HomeController@index');

/** -------------------- USER RESOURCE ----------------------- */


Router::resources([
  'users' => 'UserController',
]);
