<?php

use ScadaUnity\Http\Router;

/** -------------------- DEFAULT CONTROLLER ----------------------- */
Router::get('/', 'WelcomeController@index');

Router::get('/home', 'HomeController@index');

Router::resources([
  'users' => 'UserController',
  'account' => 'MoneyAccountController',
]);
