<?php

use App\Controllers\RequestController;
use ScadaUnity\Framework\Http\Router;

Router::get('/request','RequestController@index');
Router::post('/request/save','RequestController@save');
