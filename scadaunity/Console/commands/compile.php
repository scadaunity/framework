<?php

use ScadaUnity\Console\CliTable;

function compileHelper(){
  echo "Utilize uma das opções abaixo:".PHP_EOL.PHP_EOL;
  
  echo "php cli compile tailwind".PHP_EOL;
  echo "php cli compile webpack".PHP_EOL.PHP_EOL;
}

if ($argv[1] == 'compile') {
  logo();

  if(!isset($argv[2])){
    compileHelper();
  }

  if(isset($argv[2])) {
    switch($argv[2])
         {
            case 'tailwind':
              exec('npx tailwindcss -i ./app/Views/css/main.css -o ./public/app.css');
              break;
            case 'webpack':
              exec('npx webpack');
              break;
            default:
            echo "# Compilador não encontrado".PHP_EOL.PHP_EOL;
            compileHelper();
            break;
         }    
  }

  

  
  
}
