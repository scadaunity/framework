<?php

use ScadaUnity\Framework\Http\Router;

/** -------------------- DEFAULT CONTROLLER ----------------------- */
Router::get('/', 'WelcomeController@index');

Router::get('/home', 'HomeController@index');

/** ----------------------- AUTH RESOURCE ------------------------- */
Router::get('/login','AuthController@login');                               // EXIBE A TELA DE LOGIN
Router::get('/register','AuthController@register');                         // EXIBE A TELA DE REGISTRO DE UM NOVO USUARIO
Router::get('/forgot','AuthController@forgot');                             // EXIBE A TELA DE RECUPARAÇÃO DE SENHA
Router::get('/logout','AuthController@destroy');                            // FINLIZA A SESSÃO DO USUARIO LOGADO
Router::get('/therms','AuthController@therms');                             // EXIBE OS TERMOS DO SERVIÇO
Router::get('/privacy','AuthController@privacy');                           // EXIBE A POLITICA DE PRIVACIDADE
Router::post('/autenticate','AuthController@autenticate');                  // FAZ O LOGIN NO SISTEMA
Router::post('/create/account','AuthController@createAccount');             // CRIA UM NOVO USUARIO NO SISTEMA
Router::post('/password/reset','AuthController@sendResetPasswordByEmail');  // ENVIA O EMAIL PARA RECUPERAÇÃO DA SENHA
/** ----------------------- AUTH RESOURCE ------------------------- */



Router::resources([
  'users' => 'UserController',
  'account' => 'MoneyAccountController',
]);


/** ----------------------- ADMIN RESOURCE ------------------------- */
Router::get('/admin','AdminController@users');


Router::get('/migrations','MigrationsController@index');
Router::get('/migrations/up','MigrationsController@up');
Router::get('/migrations/down','MigrationsController@down');
