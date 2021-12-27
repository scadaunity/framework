<?php

use ScadaUnity\Framework\Console\CliTable;

$data = [
  ['command'=>'list', 'description'=>'List all avaliables commands for cli.'],
  ['command'=>'routes', 'description'=>'View any routes created for application.'],
  ['command'=>'middlewares', 'description'=>'View any middleware register for application.']
];

if ($argv[1] == 'list') {
  echo " ______________________________________________________". PHP_EOL;
  echo "|                                                      |". PHP_EOL;
  echo "|    LISTAGEM TODOS OS COMANDOS DISPONIVEIS NO CLI     |". PHP_EOL;
  echo "|______________________________________________________|". PHP_EOL;

  // Cria a tabela
  $table = new CliTable;
  $table->setTableColor('blue');
  $table->setHeaderColor('cyan');
  $table->addField('COMMAND', 'command', false, 'white');
  $table->addField('DESCRIPTION', 'description', false, 'white');
  $table->injectData($data);
  $table->display();
}
