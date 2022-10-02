<?php

use ScadaUnity\Framework\Http\Router;

Router::setMap([
    'web'       => ROOT.'/app/routes/web.php',
    'auth'       => ROOT.'/app/routes/auth.php',
]);
