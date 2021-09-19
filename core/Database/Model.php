<?php
  namespace Core\Database;


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
    protected $query;

    /**
     * Construtor da classe
     */
    function __construct()
    {
      $this->db = new Database();
      $this->query = new QueryBuilder();
    }

    public function save(){

    }

  }
