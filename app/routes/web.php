<?php

use Core\Router\Router;

/** Home */
Router::get('/','Home@index');

/** USER **/
Router::get('/user/create','Usercontroller@create');
Router::get('/user/[a-z0-9]+','Usercontroller@index');
