<?php

use ScadaUnity\Framework\Http\Router;

/** ----------------------- AUTH RESOURCE ------------------------- */
Router::get('/migration','MigrationsController@index');                         // EXIBE A TELA DE LOGIN
Router::get('/migration/up','MigrationsController@up');                         // EXIBE A TELA DE REGISTRO DE UM NOVO USUARIO
Router::get('/migration/down','MigrationsController@down');                     // EXIBE A TELA DE RECUPARAÇÃO DE SENHA
/** ----------------------- AUTH RESOURCE ------------------------- */
