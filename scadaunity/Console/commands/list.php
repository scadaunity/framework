<?php

use ScadaUnity\Console\CliTable;


$data = [
  ['command'=>'list', 'description'=>'List all avaliables commands for cli.', 'options'=>''],
  ['command'=>'routes', 'description'=>'View any routes created for application.', 'options'=>''],
  ['command'=>'middlewares', 'description'=>'View any middleware register for application.', 'options'=>''],
  ['command'=>'create:controller', 'description'=>'Create a controller.', 'options'=>'resource']
];

if ($argv[1] == 'list') {
    logo();

  echo PHP_EOL."Available commands". PHP_EOL. PHP_EOL;

  // Cria a tabela
  $table = new CliTable;
  $table->setTableColor('blue');
  $table->setHeaderColor('cyan');
  $table->addField('COMMAND', 'command', false, 'blue');
  $table->addField('DESCRIPTION', 'description', false, 'white');
  $table->addField('OPTIONS', 'options', false, 'white');
  $table->injectData($data);
  $table->display();
}
