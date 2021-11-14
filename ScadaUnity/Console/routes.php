<?php

use ScadaUnity\Http\Router;
use ScadaUnity\Console\CliTable;

if ($argv[1] == 'routes') {
    // Busca as rotas
    $data = Router::$routes;

    // Cria a tabela
    $table = new CliTable;
    $table->setTableColor('blue');
    $table->setHeaderColor('cyan');
    $table->addField('First Name', 'firstName',    false,                               'white');
    $table->addField('Last Name',  'lastName',     false,                               'white');
    $table->injectData($data);
    $table->display();
}

if ($argv[1] == 'routes:get') {
  d(Router::$routes['get']);
}
