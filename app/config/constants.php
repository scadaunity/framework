<?php

/**
 * [PT_BR] Define o namespace do diretorio padrao para a pasta controllers;
 * (PHP 4, PHP 5, PHP 7, PHP 8)
 * @var string
 */
define('CONTROLLERS_PATH','\App\\Controllers\\');

/**
 * [PT_BR] Define o caminho diretorio raiz do projeto
 * (PHP 4, PHP 5, PHP 7, PHP 8)
 * @var string
 */
define('ROOT',dirname(__FILE__,3));

/**
 * [PT_BR] Define o caminho diretorio padrão da views
 * (PHP 4, PHP 5, PHP 7, PHP 8)
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
 * (PHP 4, PHP 5, PHP 7, PHP 8)
 * @var string
 */
define('CSS_PATH',URL.'/assets/css');

/**
 * [PT_BR] Define o caminho dos arquivos javascript externo
 * (PHP 4, PHP 5, PHP 7, PHP 8)
 * @var string
 */
define('JS_PATH',URL.'/assets/js');

/**
 * [PT_BR] Define o diretório padrão para arquivos de imagem
 * (PHP 4, PHP 5, PHP 7, PHP 8)
 * @var [type]
 */
define('IMG_PATH',ASSETS_PATH.'/img');

/**
 * [PT_BR] Define o diretório padrão para os componentes
 * (PHP 4, PHP 5, PHP 7, PHP 8)
 * @var [type]
 */
define('COMPONENTS_PATH',VIEWS.'components/');



define('LOGGED','LOGGED');
