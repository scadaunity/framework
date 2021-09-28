<?php

namespace Core\Database;

use PDO;

/**
 * Classe responsavel po manipular o banco de dados
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
    $this->driver = getenv('DB_DRIVER');
    $this->host = getenv('DB_HOST');
    $this->dbname = getenv('DB_NAME');
    $this->user = getenv('DB_USER');
    $this->password = getenv('DB_PASSWORD');
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
      $statement->execute($params);
      return $statement;
    } catch (PDOException $e) {
      dd($e->getMessage());
    }

  }

  /**
   * Metodo responsavel por inserir um registro no banco de dados
   * @param  string $table
   * @param  array $values [field => value]
   * @return integer ID inserido
   */
  public function insert($table, $values){
    // Dados da query
    $fields = array_keys($values);
    $binds = array_pad([], count($fields), '?');

    // Monta a query
    $query = 'INSERT INTO ' .$table. ' (' . implode(',',$fields).') VALUES ('. implode(',',$binds) .')';

    // Executa a query
    $this->execute($query,array_values($values));

    //retorna o id inserido
    return $this->connect()->lastInsertId();
  }

  public function select($table, $where = null, $order = null, $limit = null, $fields = '*'){
    // Dados da query
    $where = strlen($where) ? 'WHERE ' .$where : '';
    $order = strlen($order) ? 'ORDER BY ' .$order : '';
    $limit = strlen($limit) ? 'LIMIT ' .$limit : '';

    // Monta a query
    $query = 'SELECT ' .$fields. ' FROM '. $table. ' ' .$where. ' ' .$order. ' ' .$limit;

    // Executa a Query
    return $this->execute($query);
  }

  /**
   * Metodo responsavel por excluir um registro do banco de dados
   * @param  string $table
   * @return [type]
   */
  public function delete($table){

  }
}
