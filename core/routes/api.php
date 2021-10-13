<?php

use Core\Http\Router;

Router::get('/api/routes','\\Core\Controllers\AxiosController@getRoutes');
