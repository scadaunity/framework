<?php

use ScadaUnity\Framework\Http\Router;

Router::get('/api/routes','\\Core\Controllers\AxiosController@getRoutes');
