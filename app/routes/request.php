<?php

use App\Controllers\RequestController;
use ScadaUnity\Http\Router;

Router::get('/request','RequestController@index');
Router::post('/request/save','RequestController@save');
