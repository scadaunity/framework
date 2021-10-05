<?php

namespace Core\Database;

use Core\Database\Database;

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
}
