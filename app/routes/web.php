<?php

use Core\Router\Router;

Router::get('/', 'HomeController@index');

Router::get('/user', 'UserController@index');
Router::get('/user/[0-9]+', 'UserController@index');
Router::get('/user/[0-9]+/name/[a-z]+', 'UserController@show');
