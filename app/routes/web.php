<?php

use ScadaUnity\Http\Router;

/** -------------------- DEFAULT CONTROLLER ----------------------- */
Router::get('/', 'WelcomeController@index');

Router::get('/home', 'HomeController@index');

/** ----------------------- AUTH RESOURCE ------------------------- */
Router::get('/login','AuthController@login');
Router::get('/register','AuthController@register');
Router::get('/forgot','AuthController@forgot');
Router::get('/forgots','AuthController@forgot');
Router::get('/logout','AuthController@destroy');
Router::get('/therms','AuthController@therms');
Router::get('/privacy','AuthController@privacy');
Router::post('/autenticate','AuthController@autenticate');
Router::post('/create/account','AuthController@createAccount');



Router::resources([
  'users' => 'UserController',
]);


/** ----------------------- ADMIN RESOURCE ------------------------- */
Router::get('/admin','AdminController@users');
