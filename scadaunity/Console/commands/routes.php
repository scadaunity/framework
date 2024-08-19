<?php

use ScadaUnity\Http\Router;
use ScadaUnity\Console\CliTable;

if (isset($argv[1]))
{
    if ($argv[1] == 'routes')
    {
        // Variavel responsavel por armazenar os resultados
        $data = [];
        
        // Busca as rotas
        Router::loadRoutes(); //inicia os arquivos de rotas
        $routes = Router::all(); // pega todas as rotas

        // Recupera as rotas get
        if (isset($routes['get'])) {
          foreach ($routes['get'] as $key => $value) {
            array_push($data, ['uri'=>$key,'method'=>'GET','action'=>$value,'name'=>'']);
          }
        }

        // Recupera as rotas post
        if (isset($routes['post'])) {
          foreach ($routes['post'] as $key => $value) {
            array_push($data, ['uri'=>$key,'method'=>'POST','action'=>$value,'name'=>'']);
          }
        }

        // Recupera as rotas put
        if (isset($routes['put'])) {
          foreach ($routes['put'] as $key => $value) {
            array_push($data, ['uri'=>$key,'method'=>'PUT','action'=>$value,'name'=>'']);
          }
        }

        // Recupera as rotas delete
        if (isset($routes['delete'])) {
          foreach ($routes['delete'] as $key => $value) {
            array_push($data, ['uri'=>$key,'method'=>'DELETE','action'=>$value,'name'=>'']);
          }
        }

        sort($data);
        
        // Transforma as closures em string para exibir na tabela 12/08/2024 - Paulo Cesar
        foreach($data as $key => $value){
          if (isset($value['action'])) {
            if(is_callable($value['action'])){
              $data[$key]['action'] = 'Closure';
            }
          } 
        }
       
        // Verifica se existe alguma rota
        if (!empty($data)) {
          // Cria a tabela
          $table = new CliTable;
          $table->setTableColor('green');
          $table->setHeaderColor('gray');
          $table->addField('URI', 'uri', false, 'white');
          $table->addField('METHOD', 'method', false, 'white');
          $table->addField('ACTION', 'action', false, 'white');
          $table->addField('NAME', 'name', true, 'white');
          $table->injectData($data);
          $table->display();
        }
    }
}

function consoleRoutesPrint($data){
    // Verifica se existe alguma rota
    if (!empty($data)) {
      // Cria a tabela
      $table = new CliTable;
      $table->setTableColor('green');
      $table->setHeaderColor('gray');
      $table->addField('URI', 'uri', false, 'white');
      $table->addField('METHOD', 'method', false, 'white');
      $table->addField('ACTION', 'action', false, 'white');
      $table->addField('NAME', 'name', true, 'white');
      $table->injectData($data);
      $table->display();
    }

    echo "Nenhuma rota encontrada";
}
