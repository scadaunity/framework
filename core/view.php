<?php

/**
 * Metodo responsavel por carregar a view
 * @param  string $view
 * @param  array|null $data               [description]
 * @return [type]       [description]
 */
function view($view, $params = [], $template = 'navbar'){
    //Monta o arquivo de saida
    $output =[];

    // define variaveis fixas pra view
    $params['user'] = user();
    $params['appTitle'] = APP_TITLE;

    //cria as variaveis para a view
    extract($params) ?? [];

    /** Verifica se a view existe */
    if (!file_exists(VIEWS.$view.'.php')) {
      throw new \Exception("Arquivo {$view}.php não encontrado", 1);
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

          //render('template/header',$params);
          /** Chama a navbar */
          require_once VIEWS.'template/navbar.php';
          /** Chama a view */
          require_once VIEWS.$view.'.php';
          //echo str_replace(array_Keys($bind),array_values($bind),$content);
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

function render($params,$view){

  // Pega a view e converte em uma string
  $viewString = file_get_contents(VIEWS.$view.'.php');
  $temp = [];
  // Percorre os parametros
  foreach ($params as $param => $value) {
    // procura por variaveis
    if (strpos($viewString, '{{'.$param.'}}') !== false) {
        $temp['{{'.$param.'}}'] = $value;
    }
  }
  $output = str_replace(array_Keys($temp),array_values($temp),$viewString);

  //pega as funções
  $pattern = '/@css+(.*)/';

  preg_match($pattern, $output,$matches);

  return $output;
}

function viewTemplate($view, $template){

}
