<?php

use ScadaUnity\Framework\Console\CliTable;

if ($argv[1] == 'serve') {
  logo();

  exec('php -S localhost:8000 -t public');
}
