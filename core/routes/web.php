<?php

use Core\Http\Router;

Router::get('/admin','\Core\Controllers\AdminController@index');
