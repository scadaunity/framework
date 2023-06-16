<?php

use App\Controllers\WelcomeController;
use ScadaUnity\Http\Router;
use ScadaUnity\Http\Client;
use ScadaUnity\Http\Response;

/** -------------------- DEFAULT CONTROLLER ----------------------- */
Router::get('/', 'WelcomeController@index');
Router::get('/home', 'WelcomeController@home');
Router::get('/dashboard','WelcomeController@dashboard');
//Router::get('/template','WelcomeController@template');

Router::get('/template',function(){ 
  view('render',['name'=>'doug']);
});

Router::resources([
  'users' => 'UserController',
  'account' => 'MoneyAccountController',
]);

Router::get('/flash',function(){
  Router::redirect('accounts');
});
