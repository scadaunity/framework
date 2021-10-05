<?php

/**
 * Metodo responsavel por carregar a view
 * @param  string $view
 * @param  array|null $data               [description]
 * @return [type]       [description]
 */
function view($view, $params = [], $template = 'navbar'){

    /** Verifica se a view existe */
    if (!file_exists(VIEWS.$view.'.php')) {
      throw new \Exception("Arquivo {$view}.php não encontrado", 1);
    }

    /** Verifica se existe parametros da URI*/
    if (!empty($params)) {
      //cria as variaveis para a view
      $data = extract($params) ?? [];
    }


    switch($template)
     {
        case 'none':
          /** Chama a view */
          require_once VIEWS.$view.'.php';
          break;
        case 'single':
          /** Chama o cabeçalho */
          require_once VIEWS.'template/header.php';
          /** Chama a view */
          require_once VIEWS.$view.'.php';
          /** Chama o footer */
          require_once VIEWS.'template/footer.php';
          break;
        case 'navbar':
          /** Chama o cabeçalho */
          require_once VIEWS.'template/header.php';
          /** Chama a navbar */
          require_once VIEWS.'template/navbar.php';
          /** Chama a view */
          require_once VIEWS.$view.'.php';
          /** Chama o footer */
          require_once VIEWS.'template/footer.php';

          break;
        case 'left-sidebar':

          break;
        case 'right-sidebar':

          break;
        case 'right-sidebar':

          break;
        default:
          throw new \Exception('Template não implementado [' . $template .']',405);
     }

}
