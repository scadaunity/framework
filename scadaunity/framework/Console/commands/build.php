<?php

use ScadaUnity\Framework\Console\CliTable;

if ($argv[1] == 'build') {
  logo();

  exec('npx tailwindcss -i ./app/Views/css/tailwind.css -o ./public/app.css --watch');
}
