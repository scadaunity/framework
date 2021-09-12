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
  private $username = '';

  /**
   * Senha do banco de dados
   * @var string
   */
  private $password = '';


  function __construct($driver,$host,$dbname,$username,$password)
  {
    $this->driver = $driver;
    $this->host = $host;
    $this->dbname = $dbname;
    $this->username = $username;
    $this->password = $password;
    //dd($this);
  }

  public function connect(){

    $str = "{$this->driver}:host={$this->host};dbname={$this->dbname}";

    return new PDO("{$str}",$this->username,$this->password,[
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
  }
}
