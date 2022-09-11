<?php


 /*
  * Exibe a versão do framework
  */
  function version()
  {
    echo "\e[35m Versão: -\e[37m 1.0.0   \e[90m 10/09/2022".PHP_EOL;
    echo "".PHP_EOL;
  }

  /*
   * Exibe o autor
   */
   function autor()
   {
     echo "\e[35m";
     echo "Autor: -\e[37m Paulo César Andrade Souza".PHP_EOL;
     echo "".PHP_EOL;
   }

  /*
   * Exibe o logo do framework
   */
   function logo()
   {
       echo "".PHP_EOL;
       echo "\e[92m     ____                   _          _   _         _  _".PHP_EOL;
       echo "\e[92m   /  ___|                 | |        | | | |       (_)| |".PHP_EOL;
       echo "\e[92m   \ `--.   ___   __ _   __| |  __ _  | | | | _ __   _ | |_  _   _".PHP_EOL;
       echo "\e[92m    `--. \ / __/ / _` | / _` | / _` | | | | || '_ \ | || __|| | | |".PHP_EOL;
       echo "\e[92m   /\__/ /| (__ | (_| || (_| || (_| | | |_| || | | || || |_ | |_| |".PHP_EOL;
       echo "\e[92m   \____/  \___| \__,_| \__,_| \__,_|  \___/ |_| |_||_| \__| \__, |".PHP_EOL;
       echo "\e[92m                                                              __/ |".PHP_EOL;
       echo "\e[92m                                                             |___/ ".PHP_EOL;
       echo "".PHP_EOL;
       echo "-------------------------------------------------------------------".PHP_EOL;
       echo "|\e[94m PHP - Framework - Brazil \e[92m                                       | ".PHP_EOL;
    echo "-------------------------------------------------------------------".PHP_EOL;
       echo "".PHP_EOL;
   }

   if ($argv[1] == '-v') {
       logo();
       version();
       autor();
   }
   /*
    Colors
    */
