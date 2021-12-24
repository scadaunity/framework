<?php
  namespace ScadaUnity\Framework\Database;

  use ScadaUnity\Framework\Database\Database;
  use ScadaUnity\Framework\Database\QueryBuilder;


  class Model
  {

    /**
     * Nome da tabela
     * @var string
     */
    protected $table;

    /**
     * Instancia de Database
     * @var Database
     */
    protected $db;

    /**
     * Instancia de QueryBuilder
     * @var QueryBuilder
     */
    protected $queryBuilder;

    /**
     * Construtor da classe
     */
    function __construct()
    {
      $this->db = new Database();
      $this->queryBuilder = new QueryBuilder();
    }

    public function all(){
      return $this->queryBuilder->all($this->table);
    }

    public function find($id){
      return $this->queryBuilder->findById($this->table,$id);
    }

    public function save($values){
      return $this->queryBuilder->insert($this->table, $values);
    }

  }