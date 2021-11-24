<?php
/*
 *---------------------------------------------------------------
 * Configurações da aplicação
 *---------------------------------------------------------------
 */

define('APP',[
  'title' => 'title',
  'url'   => 'http://192.168.15.7/localhost:5000',
]);

/**
 * [PT_BR] Define o titulo da aplicação na barra do navegador
 * (PHP 4, PHP 5, PHP 7, PHP 8)
 * Tambem será utilizado para o remetente de mensagens enviadas por email.
 * @var string
 */
define("APP_TITLE",'Scada Unity');

/**
 * [PT_BR] Define a url completa do projeto.
 * (PHP 4, PHP 5, PHP 7, PHP 8)
 * @var string
 */
define('URL','http://192.168.15.7/framework/public');

/**
 * [PT_BR] Define o titulo da aplicação na barra do navegador
 * (PHP 4, PHP 5, PHP 7, PHP 8)
 * Tambem será utilizado para o remetente de mensagens enviadas por email.
 * @var string
 */
define("LANG",'pt-br');

/**
 * [PT_BR] Define o tipo de ambiente de execução do seu aplicativo
 * (PHP 4, PHP 5, PHP 7, PHP 8)
 * tipos disponiveis (development,testing,production)
 * @var string
 */
define("ENVIRONMENT",'development');

/**
 * Define o modo de parse das views
 * modos disponiveis (php)
 * modos a implementar (spa,vue,react)
 * @var [type]
 */
define('STACK','php');
