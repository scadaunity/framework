<?php

namespace ScadaUnity\Framework\Database;

use ScadaUnity\Framework\Database\Database;
use PDOException;

/**
 *
 */
class QueryBuilder
{
  /**
   * Instancia de database
   * @var Database
   */
  private $db;

  /**
   * Construtor da classe
   */
  function __construct()
  {
    $this->db = new Database();
  }

  /**
   * Metodo responsavel por buscar todos os registros da tabela
   * @param  string $table
   * @return Object,PDOException
   */
  public function all($table){
    try {
      $query = "select * from {$table}";

      return $this->db->connect()->query($query)->fetchAll();

    } catch (PDOException $e) {
      dd($e->getMessage());
    }

  }

  /**
   * Metodo responsavel por recuperar um registro pelo id
   * @param  string $table
   * @param  integer $id
   * @return Object,PDOException
   */
  public function findById($table,$id){
    try {
      $query = "SELECT * FROM {$table} WHERE `id`='{$id}'";

      return $this->db->connect()->query($query)->fetch();

    } catch (PDOException $e) {
      dd($e->getMessage());
    }

  }

  /**
   * Metodo responsavel por recuperar registro no banco de dados
   * @param  string $table
   * @param  array $values
   * @return Object,PDOException
   */
  public function findBy($table, $field, $value, $fields = '*'){
    try {
      // Monta a query
      $query = "SELECT {$fields} FROM {$table} WHERE {$field} =:{$field}";

      $connect = $this->db->connect();
      $prepare = $connect->prepare($query);
      $prepare->execute([
        $field => $value
      ]);

      return $prepare->fetch();

    } catch (PDOException $e) {
      dd($e->getMessage());
    }

  }

  /**
   * Metodo responsavel por inserir um registro na tabela
   * @param  string $table
   * @param  array $values
   * @return
   */
  public function insert($table,$values){

    try {
      // Dados da query
      $fields = array_keys($values);
      $binds = array_pad([], count($fields), '?');

      // Monta a query
      $query = 'INSERT INTO ' .$table. ' (' . implode(',',$fields).') VALUES ('. implode(',',$binds) .')';

      // Executa a query
      return $this->db->execute($query,array_values($values));

    } catch (PDOException $e) {
      dd($e->getMessage());
    }
  }

}
