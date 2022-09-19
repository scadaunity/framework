<?php

use ScadaUnity\Framework\Http\Router;

Router::setMap([
    'web'       => ROOT.'/app/routes/web.php',
    'products'  => ROOT.'/app/routes/products.php'
]);
