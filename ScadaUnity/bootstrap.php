<?php
use ScadaUnity\Env;

/** Carrega as variaveis de ambiente do projeto */
Env::load(dirname(__FILE__,2));

/** Carrega as configurações */
require_once dirname(__FILE__,2).'/app/config/app.php';
require_once dirname(__FILE__,2).'/app/config/constants.php';
require_once dirname(__FILE__,2).'/app/config/database.php';
require_once dirname(__FILE__,2).'/app/config/debug.php';
require_once dirname(__FILE__,2).'/app/config/logger.php';
require_once dirname(__FILE__,2).'/app/config/middlewares.php';
require_once dirname(__FILE__,2).'/app/config/template.php';

/** carrega os helpers */
require_once 'helpers/environment.php';
require_once 'helpers/debug.php';
require_once 'helpers/assets.php';
require_once 'helpers/flash.php';
require_once 'helpers/redirect.php';
require_once 'helpers/sessions.php';
require_once 'helpers/env.php';
require_once 'helpers/token.php';
require_once 'helpers/validate.php';
require_once 'helpers/view.php';

/** carrega libs do core */
require_once 'controller.php';



/** Carrega os arquivos de rotas */
require dirname(__FILE__,2).'/app/routes/api.php';
require dirname(__FILE__,2).'/app/routes/web.php';
require dirname(__FILE__,2).'/app/routes/console.php';

if (ENVIRONMENT == 'development') {
  require 'routes/api.php';
  require 'routes/web.php';
  require 'routes/console.php';
}
