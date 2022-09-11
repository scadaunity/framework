<?php
use ScadaUnity\Framework\Env;
use ScadaUnity\Framework\App;

spl_autoload_register(
    function($class){
        require "$classe.php";
    }
);


/** Carrega as variaveis de ambiente do projeto */
Env::load(dirname(__FILE__,1));

/** inicia uma sessão vazia */
//session_save_path ('../storage/sessions');
session_save_path( sys_get_temp_dir());
session_start();

/** Carrega as configurações */
require_once 'app/config/app.php';
require_once 'app/config/paths.php';
require_once 'app/config/database.php';
require_once 'app/config/logger.php';
require_once 'app/config/mail.php';
require_once 'app/config/middlewares.php';
require_once 'app/config/view.php';


/** carrega os helpers */
require_once 'scadaunity/framework/helpers/environment.php';
require_once 'scadaunity/framework/helpers/debug.php';
require_once 'scadaunity/framework/helpers/assets.php';
require_once 'scadaunity/framework/helpers/flash.php';
require_once 'scadaunity/framework/helpers/redirect.php';
require_once 'scadaunity/framework/helpers/sessions.php';
require_once 'scadaunity/framework/helpers/env.php';
require_once 'scadaunity/framework/helpers/validate.php';
require_once 'scadaunity/framework/helpers/helperView.php';

/** carrega libs do core */
require_once 'scadaunity/framework/controller.php';



/** Carrega os arquivos de rotas */
require_once 'app/routes/api.php';
require_once 'app/routes/web.php';
require_once 'app/routes/console.php';

if (ENVIRONMENT == 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}

//setToken();
