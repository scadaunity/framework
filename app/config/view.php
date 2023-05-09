<?php

use ScadaUnity\View\View;
use ScadaUnity\View\Template;

/** Dados compartilhados entre as views*/
View::share([
  'URL' => URL,
  'APP_TITLE' => APP_TITLE,
  'ENV' => ENVIRONMENT,
  'ROOT' => ROOT,
  'VIEWS' => VIEWS,
  'CSS_PATH' => CSS_PATH,
  'JS_PATH' => JS_PATH,
  'IMG_PATH' =>IMG_PATH,
  'LOGGED' => LOGGED,
  'LANG' => LANG,
  'CHARSET' => CHARSET
]);

/** Dados compartilhados entre as views*/
Template::share([
  'URL' => URL,
  'APP_TITLE' => APP_TITLE,
  'ENV' => ENVIRONMENT,
  'ROOT' => ROOT,
  'VIEWS' => VIEWS,
  'CSS_PATH' => CSS_PATH,
  'JS_PATH' => JS_PATH,
  'IMG_PATH' =>IMG_PATH,
  'LOGGED' => LOGGED,
  'LANG' => LANG,
  'CHARSET' => CHARSET
]);
