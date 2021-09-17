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

  public function find($table,$field = '*'){
    try {
      $query = "select {$field} from {$table}";
      //dd($field);
      if (is_numeric($field)) {
        $query = "select * from {$table} where id={$field}";
        return $this->db->connect()->query($query)->fetch();
        exit;
      }

      return $this->db->connect()->query($query)->fetchAll();

    } catch (PDOException $e) {
      dd($e->getMessage());
    }

  }
}
