<?php

use ScadaUnity\Framework\Http\Router;

/**
 * Metodo responsavel por carregar arquivos de rotas
 * @var array
 */
Router::setMap([
    'web'       => ROOT.'/app/routes/web.php',
    'auth'      => ROOT.'/app/routes/auth.php',
    'migration' => ROOT.'/app/routes/migration.php',
    'components'=> ROOT.'/app/routes/components.php',
    'request'   => ROOT.'/app/routes/request.php',
]);
