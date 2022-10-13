<?php

namespace ScadaUnity\Framework\Database;

use PDO;
use PDOException;
use ScadaUnity\Framework\Database\Types;
use ScadaUnity\Framework\Database\Database;


class Schema extends Types
{
    /**
     * Instancia de database
     * @var Database
     */
    private $db;

    /**
     * Nome da tabela
     * @var string
     */
    private $table;

    /**
     * Armazena a query
     * @var string
     */
    private $query;

    /**
     * Construtor da classe
     */
    function __construct()
    {
      $this->db = new Database();

    }
    /**
     * Define o nome da tabela
     * @param  string $table
     * @return Forge
     */
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * Metodo responsavel por criar uma tabela no banco de dados
     * @param string $table
     * @return [type]
     */
    public static function create(string $table = '',$teste)
    {
        $param = call_user_func($teste);
        //dd(self::$fields);
        $total = count(self::$fields);
        $i = 0;
        try {
          $query = "CREATE TABLE IF NOT EXISTS {$table}"." (";
          if(!empty(self::$fields)){
              foreach (self::$fields as $field) {
                  $query .= $field;
                  $i++;
                  if($i<$total){
                      $query.=',';
                  }
              }
          }
          $query .=");";
          
          
          $db = new Database();
          $execute = $db->connect()->query($query);

        } catch (PDOException $e) {
          dd($e);
        }
    }

    /**
     * Metodo responsavel por excluir uma tabela no banco de dados
     * @return [type]
     */
    public static function drop($table)
    {
        try {
            $db = new Database();
            $query = "DROP TABLE {$table}";
            $execute = $db->connect()->query($query);

        } catch (PDOException $e) {
          dd($e->getMessage());
        }
    }

    /**
     * Metodo responsavel por excluir uma tabela no banco de dados
     * @return [type]
     */
    public static function dropIfExists($table)
    {
        try {
            $db = new Database();
            $query = "DROP TABLE IF EXISTS {$table}";
            $execute = $db->connect()->query($query);

        } catch (PDOException $e) {
          dd($e->getMessage());
        }
    }

    public static function all()
    {
        try {
            $db = new Database();
            $query = "SHOW TABLES";
            $execute = $db->connect()->query($query);

            dd($execute->fetchAll(PDO::FETCH_COLUMN));

        } catch (PDOException $e) {
          dd($e->getMessage());
        }
    }

    /**
     * Metodo responsavel por criar uma tabela no banco de dados
     * @return [type]
     */
    public function create_bkp()
    {
        $total = count($this->fields);
        $i = 0;
        try {
          $query = "CREATE TABLE IF NOT EXISTS {$this->table}"." (";
          if(!empty($this->fields)){
              foreach ($this->fields as $field) {
                  $query .= $field;
                  $i++;
                  if($i<$total){
                      $query.=',';
                  }
              }
          }
          $query .=");";
          $execute = $this->db->connect()->query($query);

        } catch (PDOException $e) {
          dd($e->getMessage());
        }
    }
}
