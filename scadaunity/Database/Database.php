<?php

namespace ScadaUnity\Database;

use PDO;
use PDOException;
use ScadaUnity\Framework\Database\QueryBuilder;

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
   * Nome do banco de dados
   * @var string
   */
  private $name = '';

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
    $this->driver   = getenv('DB_DRIVER');
    $this->host     = getenv('DB_HOST');
    $this->name     = getenv('DB_NAME');
    $this->user     = getenv('DB_USER');
    $this->password = getenv('DB_PASSWORD');
  }

  /**
   * Metodo responsavel por abrir uma conexão com o banco de dados
   * @return PDO
   */
  public function connect(){
    $str = "{$this->driver}:host={$this->host};dbname={$this->name}";
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
