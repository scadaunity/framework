<?php

namespace ScadaUnity\Framework\Database;

use ScadaUnity\Framework\Database\QueryBuilder;
use PDO;

/**
 * Classe responsavel por manipular o banco de dados
 */
class Database
{
  /**
   * String de conexão PDO
   * @var string
   */
  private $dsn = '';

  /**
   * Tipo do banco de dados [tipos permitidos: mysql]
   * @var string
   */
  private $driver = '';

  /**
   * Url do banco de dados
   * @var string
   */
  private $host = '';

  /**
   * Nome de usuario do banco de dados
   * @var string
   */
  private $user = '';

  /**
   * Senha do banco de dados
   * @var string
   */
  private $password = '';

  /**
   * Metodo construtor da classe
   */
  function __construct()
  {

    $this->driver   = getenv('DB_DRIVER')   == false ? $this->driver = DB_DRIVER : 'true';
    $this->host     = getenv('DB_HOST')     == false ? $this->host = DB_HOST : 'true';
    $this->dbname   = getenv('DB_NAME')     == false ? $this->dbname = DB_NAME : 'true';
    $this->user     = getenv('DB_USER')     == false ? $this->user = DB_USER : 'true';
    $this->password = getenv('DB_PASSWORD') == false ? $this->ássword = DB_PASSWORD : 'true';

    dd($this);
  }

  /**
   * Metodo responsavel por abrir uma conexão com o banco de dados
   * @return PDO
   */
  public function connect(){
    $str = "{$this->driver}:host={$this->host};dbname={$this->dbname}";
    return new PDO("{$str}",$this->user,$this->password,[
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
  }

  /**
   * Metodo responsavel por executar as queries dentro do banco de dados
   * @param  string $query
   * @param  array $params
   * @return PDOStatement
   */
  public function execute($query, $params = []){
    try {
      $statement = $this->connect()->prepare($query);
      return $statement->execute($params);
    } catch (PDOException $e) {
      //dd($e->getMessage());
    }
  }
}
