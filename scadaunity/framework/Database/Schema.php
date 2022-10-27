<?php

namespace ScadaUnity\Framework\Database;

use PDO;
use PDOException;

//use ScadaUnity\Framework\Database\Database;

/**
 * Classe responsavel por manipular tabelas no banco de dados.
 * Criar, alterar ou excluir.
 */
class Schema extends Table
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
    public $query = [];

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
     * @param string $table Nome da tabela
     * @return [type]
     */
    public static function create($table,$callback)
    {
      
      // VERIFICA SE É UMA CLOSURE E EXECUTA A FUNÇÃO ANONIMA
      if(is_callable($callback)){
        $teste = call_user_func($callback);
      }

      // VERIFICA SE EXISTE AS QUERIES DE TIPOS.
      if(empty(self::$fields)){
        return false;
      }

      // MONTA A QUERY do schema
      $total = count(self::$fields);
      $i = 0;
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

      // LIMPA AS QUERIES DE TIPOS
      self::$fields = [];
      
      try {
        $db = new Database();
        $db->execute($query);
        echo "\e[92mSuccess: \e[33mcreate \e[33m{$table} table".PHP_EOL.PHP_EOL;
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
            echo "\e[92mSuccess: \e[33mRollback \e[33m{$table} table".PHP_EOL.PHP_EOL;

        } catch (PDOException $e) {
          dd($e->getMessage());
        }
    }

    /**
     * Metodo responsavel por retornar todas as tabelas
     * @return array All tables of database
     */
    public static function all()
    {
      try {
        $db = new Database();
        $query = "SHOW TABLES";
        return $db->connect()->query($query)->fetchAll(PDO::FETCH_COLUMN);
      } catch (PDOException $e) {
        dd($e->getMessage());
      }
    }

    /**
     * 
     */
    private function execute(){

    }
}
