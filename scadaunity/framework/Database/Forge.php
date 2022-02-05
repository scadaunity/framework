<?php

namespace ScadaUnity\Framework\Database;

use ScadaUnity\Framework\Database\Database;
use ScadaUnity\Framework\Database\Types;


class Forge extends Types
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

    public function mount(){

    }

    public function create(){
        $total = count($this->fields);
        $i = 0;
        d($this->fields);
        try {
          $query = "CREATE TABLE IF NOT EXISTS {$this->table}"." (";
          if(!empty($this->fields)){
              foreach ($this->fields as $field) {
                  d($field);
                  $query .= $field;
                  $i++;
                  if($i<$total){
                      $query.=',';
                  }
              }
          }
          $query .=");";
          //dd($query);
          $execute = $this->db->connect()->query($query);

          dd($execute);

        } catch (PDOException $e) {
          dd($e->getMessage());
        }
    }
}
