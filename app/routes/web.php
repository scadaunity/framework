<?php

use Core\Http\Router;

Router::get('/', 'HomeController@index');
Router::get('/doug', 'DougController@index');

/** -------------------- USER RESOURCE ----------------------- */
Router::get('/user', 'UserController@index');
Router::get('/user/[0-9]+', 'UserController@index');
Router::get('/user/[0-9]+/name/[a-z]+', 'UserController@show');

Router::post('/user/create','UserController@create');
