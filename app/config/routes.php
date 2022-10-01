<?php

use ScadaUnity\Framework\Http\Router;

Router::setMap([
    'web'       => ROOT.'/app/routes/web.php',
    'test'       => ROOT.'/app/routes/test.php',
]);
