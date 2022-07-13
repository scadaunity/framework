<?php

/**
 * [PT_BR] Define a url completa do projeto.
 * @var string
 */
<<<<<<< HEAD
define('URL','http://localhost:5000');
=======
//define('URL','http://localhost:8000');
define('URL','https://scadaunityframework.herokuapp.com');
>>>>>>> 66f7e5debfd031f316c8897c002a60c5da1d1e73

/**
 * [PT_BR] Define o namespace do diretorio padrao para a pasta controllers;
 * @var string
 */
define('CONTROLLERS_PATH','\App\\Controllers\\');

/**
 * [PT_BR] Define o caminho diretorio raiz do projeto
 * @var string
 */
define('ROOT',dirname(__FILE__,3));

/**
 * [PT_BR] Define o caminho diretorio padrão da views
 * @var string
 */
define('VIEWS',ROOT.'/app/Views/');

/**
 * [PT_BR] Define o diretorio padrão de assets do framework
 * @var [type]
 */
define('ASSETS_PATH',URL.'/assets');

/**
 * [PT_BR] Define o caminho dos arquivos css externo
 * @var string
 */
define('CSS_PATH',URL.'/assets/css');

/**
 * [PT_BR] Define o caminho dos arquivos javascript externo
 * @var string
 */
define('JS_PATH',URL.'/assets/js');

/**
 * [PT_BR] Define o diretório padrão para arquivos de imagem
 * @var [type]
 */
define('IMG_PATH',ASSETS_PATH.'/img');

/**
 * [PT_BR] Define o diretório padrão para os componentes
 * @var [type]
 */
define('COMPONENTS_PATH',VIEWS.'components/');

/**
 * [PT_BR] Define o diretório padrão para os componentes
 * @var [type]
 */
define('TEMPLATES_PATH',VIEWS.'template/');

/**
 * [PT_BR] Define o caminho diretorio padrão da views
 * @var string
 */
define('LOGS_PATH',ROOT.'/storage/logs/');



define('LOGGED','LOGGED');
