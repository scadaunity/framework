<?php

use ScadaUnity\Framework\Http\Router;

Router::get('/admin','\ScadaUnity\Framewor\Controllers\AdminController@index');
Router::get('/icons','\ScadaUnity\Framework\Controllers\IconsController@index');
