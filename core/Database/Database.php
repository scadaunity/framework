<?php

namespace Core\Database;

use PDO;

/**
 *
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


  function __construct()
  {
    $this->driver = DB_DRIVER;
    $this->host = DB_HOST;
    $this->dbname = DB_NAME;
    $this->user = DB_USER;
    $this->password = DB_PASSWORD;
  }

  public function connect(){

    $str = "{$this->driver}:host={$this->host};dbname={$this->dbname}";

    return new PDO("{$str}",$this->user,$this->password,[
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
  }
}
