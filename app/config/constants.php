<?php
/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * NOTE: AVALIABLE OPTIONS (develop,testing,production)
 */
define("ENVIRONMENT",'develop');

define('ENABLE_UPLOADS', true);

define('CONTROLLERS_PATH','\App\\Controllers\\');

define('ROOT',dirname(__FILE__,3));

define('VIEWS',ROOT.'/app/Views/');

define('CSS_PATH',URL.'/assets/css/');

define('JS_PATH',URL.'/assets/js/');

define('IMG_PATH',URL.'/assets/img/');

define('ASSETS_PATH',ROOT.'/public/assets/');

define('LOGGED','LOGGED');
