<?php

use ScadaUnity\Http\Router;

Router::get('/api/routes','\\Core\Controllers\AxiosController@getRoutes');
