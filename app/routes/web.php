<?php

use App\Controllers\WelcomeController;
use ScadaUnity\Http\Router;

/** -------------------- DEFAULT CONTROLLER ----------------------- */
Router::get('/', 'WelcomeController@index');
Router::get('/home', 'WelcomeController@home');
Router::get('/dashboard','WelcomeController@dashboard');

Router::resources([
  'users' => 'UserController',
  'account' => 'MoneyAccountController',
]);
