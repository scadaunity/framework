<?php

namespace Core\View;

/**
 *
 */
class View
{
  /**
   * Metodo responsavel por renderizar a view
   * @param  string $view
   * @param  array $params
   * @return string
   */
  public static function view($view, $params = []){

    if (!file_exists(VIEWS.$view.'.php')) {
      throw new \Exception("Arquivo não encontrado", 500);
    }

    require VIEWS.$view.'.php';

  }

  /**
   * Metodo responsavel por renderizar a view
   * @param  string $view
   * @param  array $params
   * @return string
   */
  public static function render($view, $params = []){

    // pega o conteudo da view
    $contentView = self::getContentView($view);

    // pega as variaveis globais
    $defaultVars = self::getGlobalVariables();

    // junta as variaveis globais com as variaveis passadas no controller
    $vars = array_merge($defaultVars,$params);

    //pega as chaves do array de variaveis
    $keys = array_Keys($vars);

    // insere as variaveis ao conteudo da view
    $contentView = self::parseVariables($contentView, $vars, $keys);

    // insere as variaveis ao conteudo da view
    $contentView = self::parseIf($contentView, $vars, $keys);

    echo $contentView;

  }

  /**
   * Metodo responsavel por pegar o conteudo da view
   * @param  string path
   * @return string text/html
   */
  private static function getContentView($view){
    return file_exists(VIEWS.$view.'.php') ? file_get_contents(VIEWS.$view.'.php') : '';
  }

  /**
   * Metodo responsavel por substituir as variaveis no content da view
   * @return string text/html
   */
  private static function parseVariables($contentView, $vars, $keys){
    // formata as variaveis
    $keys = array_map(function($item){
      return '{{'.$item.'}}';
    },$keys);

    return str_replace($keys,array_values($vars),$contentView);
  }

  /**
   * Metodo responsavel por substituir as condicionais no content da view
   * @return string text/html
   */
  private static function parseIf($contentView, $vars, $keys){

    //$contentView = '@if user == true @endif';
    $pattern   = '/^@if (.*) (.*) (.*) (@endif)$/';

    preg_match_all($pattern,$contentView,$matches);



  

    if ($matches[0] == null) {
      return $contentView;
    }


    if (array_count_values($matches[0]) > 1) {
      foreach ($matches[0] as $key => $value) {
        echo $value."<br>";
      }
    }






     //formata as variaveis

    $keys = array_map(function($item){
      return '{{'.$item.'}}';
    },$keys);


    return str_replace($keys,array_values($vars),$contentView);
  }

  /**
   * Metodo responsavel por inserir as variaveis globais em todas as views
   * @return [type]
   */
  private static function getGlobalVariables(){

    // Define os dados da view en todas as requisições
    $data = [
      'URL' => URL,
      'APP_TITLE' => APP_TITLE,
      'ENV' => ENVIRONMENT,
      'ROOT' => ROOT,
      'VIEWS' => VIEWS,
      'CSS_PATH' => CSS_PATH,
      'JS_PATH' => JS_PATH,
      'IMG_PATH' =>IMG_PATH,
      'LOGGED' => LOGGED,
      'CSRF' =>csrf()
    ];

    // adiciona as flash messages ao template
    $flash = getAllFlash();
    if (!$flash == null) {
      foreach ($flash as $key => $value) {
        $data['flash.'.$key]=$value;
      }
    }

    //adiciona os dados do usuario logado
    $user = user();
    if ($user) {
      $data['user.id']=$user->id;
      $data['user.name']=$user->name;
      $data['user.email']=$user->email;
    }

    return $data;
  }
}
