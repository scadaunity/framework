<?php
use ScadaUnity\Env;

/** Carrega as variaveis de ambiente do projeto */
Env::load(dirname(__FILE__,1));

/** inicia uma sessão vazia */
//session_save_path ('../storage/sessions');
session_save_path( sys_get_temp_dir());
session_start();

/** Carrega as configurações */
require_once 'app/config/app.php';
require_once 'app/config/paths.php';
require_once 'app/config/log.php';
require_once 'app/config/mail.php';
require_once 'app/config/middlewares.php';
require_once 'app/config/view.php';
require_once 'app/config/routes.php';

/** carrega os helpers */
require_once 'scadaunity/helpers/environment.php';
require_once 'scadaunity/helpers/debug.php';
require_once 'scadaunity/helpers/assets.php';
require_once 'scadaunity/helpers/flash.php';
require_once 'scadaunity/helpers/redirect.php';
require_once 'scadaunity/helpers/sessions.php';
require_once 'scadaunity/helpers/env.php';
require_once 'scadaunity/helpers/validate.php';
require_once 'scadaunity/helpers/helperView.php';

/** carrega libs do core */
require_once 'scadaunity/controller.php';

if (ENVIRONMENT == 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}

setToken();


