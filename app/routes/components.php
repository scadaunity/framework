<?php

use ScadaUnity\Framework\Http\Router;

/** -------------------- DEFAULT CONTROLLER ----------------------- */
Router::get('/components', 'Component@index');
