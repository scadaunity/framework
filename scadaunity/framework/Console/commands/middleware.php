<?php

use ScadaUnity\Framework\Http\Middleware;
use ScadaUnity\Framework\Console\CliTable;

$data = [

];

foreach (Middleware::$map as $key => $value) {
  array_push($data, ['alias'=>$key,'namespace'=>$value]);
}



if ($argv[1] == 'middleware') {
  echo " _______________________________________________________________". PHP_EOL;
  echo "|                                                               |". PHP_EOL;
  echo "|    LISTAGEM TODOS OS MIDDLEWARES DISPONIVEIS NA APLICAÇÃO     |". PHP_EOL;
  echo "|_______________________________________________________________|". PHP_EOL;

  // Cria a tabela
  $table = new CliTable;
  $table->setTableColor('blue');
  $table->setHeaderColor('cyan');
  $table->addField('ALIAS', 'alias', false, 'white');
  $table->addField('NAMESPACE', 'namespace', false, 'white');
  $table->injectData($data);
  $table->display();
}
