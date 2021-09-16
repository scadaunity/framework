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
      //verifica o tipo do primeiro parametro passado
      if (is_numeric($table)) {
        // code...
      }

      return $this->db->connect()->query($query)->fetchAll();

    } catch (PDOException $e) {
      dd($e->getMessage());
    }

  }
}
