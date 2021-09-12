<?php

namespace Core\Http;

/**
 *
 */
 class Request
 {
    /**
    * Current version of Request
    *
    * @var string
    */
    const VERSION = '1.8.1';

    /**
    * Metodo http da requisição
    *
    * @var string
    */
     private $method;

     /**
     * A URI da nossa pagina
     *
     * @var string
     */
     private $uri;

     /**
     * Parametros da URL ($_GET)
     *
     * @var array
     */
     private $get = [];

     /**
     * Parametros da URL ($_POST)
     *
     * @var array
     */
     private $post = [];

     /**
     * Cabeçalho da requisição
     *
     * @var array
     */
     private $headers = [];

     /**
     * Contrutor da classe
     */
     public function __construct()
     {
        $this->get = $_GET ?? '';
        $this->post = $_POST ?? '';
        $this->headers = getallheaders();
        $this->uri  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '';
        $this->method = strtolower($_SERVER['REQUEST_METHOD']) ?? '';
     }

     /**
     * Metodo responsavel por retornar a URI da requisição
     * @return string
     */
     public function uri(){
         return $this->uri;
     }

     /**
     * Metodo responsavel por retornar o metodo HTTP da requisição
     * @return string
     */
     public function method(){

         return $this->method;
     }

     /**
     * Metodo responsavel por retornar os headers da requisição
     * @return array
     */
     public function headers(){

         return $this->headers;
     }

     /**
     * Metodo responsavel por retornar os parametros da URL da requisição
     * @return array
     */
     public function get(){

         return $this->get;
     }

     /**
     * Metodo responsavel por retornar as variaveis POST da requisição
     * @return array
     */
     public function post(){

         return $this->post;
     }
 }
