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

define('URL','http://localhost:5000');

define('CONTROLLERS_PATH','\App\\Controllers\\');

define('ROOT',dirname(__FILE__,3));

define('VIEWS',ROOT.'/app/Views/');

define('CSS_PATH',ROOT.'/public/assets/css/');

define('JS_PATH',ROOT.'/public/assets/js/');
