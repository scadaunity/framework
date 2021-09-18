<?php

/**
 * Metodo responsavel por carregar a view
 * @param  string $view               [description]
 * @param  array|null $data               [description]
 * @return [type]       [description]
 */
function view($view, $params = []){

    /** Verifica se a view existe */
    if (!file_exists(VIEWS.$view.'.php')) {
      throw new \Exception("Arquivo {$view}.php não encontrado", 1);
    }

    /** Verifica se existe parametros da URI*/
    if (!empty($params)) {
      //cria as variaveis para a view
      $data = extract($params) ?? [];
    }

    /** Chama o cabeçalho */
    require_once VIEWS.'template/header.php';
    /** Chama a view */
    require_once VIEWS.$view.'.php';
    /** Chama o footer */
    require_once VIEWS.'template/footer.php';
}
