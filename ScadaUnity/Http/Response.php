<?php

namespace ScadaUnity\Http;

/**
 *
 */
class Response
{
  /**
   * Codigo do status HTTP;
   * @var integer
   */
  private $statusCode = 200;

  /**
   * Cabeçalho do response;
   * @var array
   */
  private $headers = [];

  /**
   * Tipo do conteudo que está sendo retornado;
   * @var string
   */
  private $contentType = 'text/html';

  /**
   * Conteudo do response;
   * @var mixed
   */
  private $content;

  /**
   * Metodo construtor da classe
   * @param integer $statusCode
   * @param mixed   $content
   * @param string  $contentType
   */

  public function __construct($statusCode,$content,$contentType = 'text/html'){
    $this->statusCode = $statusCode;
    $this->content = $content;
    $this->contentType = $contentType;
  }

  /**
   * Metodo responsavel por alterar o content type do response
   * @param string $contentType
   */
  public function setContentType($contentType){
    $this->contentType = $contentType;
  }
  /**
   * Metodo responsavel por adicionar um registro no cabeçalho do response
   * @param string $key
   * @param string $value
   */
  public function addHeader($key,$value){
    $this->headers[$key] = $value;
  }

  /**
   * Metodo responsavel por enviar os header ao navegador
   */
  public function sendHeaders(){
    http_response_code($this->statusCode);

    foreach ($this->headers as $key => $value) {
      header($key.':'.$value);
    }
  }

  /**
   * Metodo responsavel por enviar a resposta ao usuario
   */
  public function sendResponse(){
    // Envia os headers
    $this->sendHeaders();

    // Imprime o conteudo
    switch ($this->contentType) {
      case 'text/html':
        echo $this->content;
        exit;

      default:
        // code...
        break;
    }
  }

}
