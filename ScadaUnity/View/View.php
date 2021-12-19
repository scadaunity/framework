<?php

namespace ScadaUnity\View;

/**
 *
 */
class View
{
  private $patterns = [
    '/(^@component\(( ?[\w]+ ?)\))/gm' // @component(component)
  ];

  public static $defaultVariables = [
    'URL' => URL,
    'APP_TITLE' => APP_TITLE,
    'ENV' => ENVIRONMENT,
    'ROOT' => ROOT,
    'VIEWS' => VIEWS,
    'CSS_PATH' => CSS_PATH,
    'JS_PATH' => JS_PATH,
    'IMG_PATH' =>IMG_PATH,
    'LOGGED' => LOGGED,
    'LANG' => LANG,
    'CHARSET' => CHARSET
  ];

  /**
   * Construtor da classe
   */
  public function __construct(){

  }

  /**
   * Metodo responsavel por renderizar a view
   * @param  string $view
   * @param  array $params
   * @return string
   */
  public static function view($view, $params = []){
    // Criar as variaveis para a view
    extract($params);

    // Verifica se o arquivo existe
    if (!file_exists(VIEWS.$view.'.php')) {
      throw new \Exception("Arquivo não encontrado", 500);
    }

    // Carrega a view
    require VIEWS.$view.'.php';
  }

  /**
   * Metodo responsavel por renderizar a view
   * @param  string $view
   * @param  array $params
   * @return string
   */
  public static function render($view, $params = []){

    // Pega o conteudo da view
    $contentView = self::getContentView($view);

    // Junta as variaveis globais com as variaveis passadas no controller
    $vars = array_merge(self::$defaultVariables,$params);

    // Pega as chaves do array de variaveis
    $keys = array_Keys($vars);

    // Insere os componentes ao conteudo da view
    $contentView = self::parseComponents($contentView, $vars, $keys);

    // Insere os componentes ao conteudo da view
    $contentView = self::parseRoutes($contentView, $vars, $keys);

    // Insere os componentes ao conteudo da view
    $contentView = self::parseTemplates($contentView, $vars, $keys);

    // Insere as variaveis ao conteudo da view
    $contentView = self::parseIf($contentView, $vars, $keys);

    // Insere as variaveis ao conteudo da view
    $contentView = self::parseVariables($contentView, $vars, $keys);

    return $contentView;

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
   * Metodo responsavel por adicionar os components ao content da view
   * @return string text/html
   */
  private static function parseComponents($contentView, $vars, $keys){

    // Cria o padrão da regex
    $pattern   = '/^@component\(( *?[\w]+ *?)\)$/m';

    //Captura os valor no contentview
    preg_match_all($pattern,$contentView,$matches);

    dd($matches);

    // Armazena as chaves
    $keys = $matches[0];
    $components = $matches[1];

    $vars = [];
    foreach ($components as $component) {

      array_push($vars,file_get_contents(COMPONENTS_PATH.$component.'.php'));
    }

    return str_replace($keys,array_values($vars),$contentView);
  }

  /**
   * Metodo responsavel por adicionar os components ao content da view
   * @return string text/html
   */
  private static function parseRoutes($contentView, $vars, $keys){

    // Cria o padrão da regex
    $pattern   = '/@route\((\w*?)\)/';

    //Captura os valor no contentview
    preg_match_all($pattern,$contentView,$matches);

    // Armazena as chaves
    $keys = $matches[0];
    $routes = $matches[1];

    $vars = [];
    foreach ($routes as $route) {
      array_push($vars,URL.'/'.$route);
    }

    return str_replace($keys,array_values($vars),$contentView);
  }

  /**
   * Metodo responsavel por adicionar os components ao content da view
   * @return string text/html
   */
  private static function parseTemplates($contentView, $vars, $keys){

    // Cria o padrão da regex
    $pattern   = '/@template\((\w*?)\)/';

    //Captura os valor no contentview
    preg_match_all($pattern,$contentView,$matches);

    // Armazena as chaves
    $keys = $matches[0];
    $templates = $matches[1];

    $vars = [];
    foreach ($templates as $template) {

      array_push($vars,file_get_contents(TEMPLATES_PATH.$template.'.php'));
    }

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

  public static function setDefaultVariables(){

  }
}
