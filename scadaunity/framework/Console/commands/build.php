<?php

use ScadaUnity\Framework\Console\CliTable;

if ($argv[1] == 'compile') {
  logo();
  if($argv[2] == 'css') {
    exec('npx tailwindcss -i ./app/Views/css/main.css -o ./public/app.css --watch');
  }
  
}
