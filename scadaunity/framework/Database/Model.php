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
     * Chave primaria
     */
    protected $primaryKey = 'id';

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

    /**
     * Metodo responsavel por retornar todos os registros
     */
    public function all()
    {
      return $this->queryBuilder->all($this->table);
    }

    /**
     * Metodo responsavel por retornar um id especifico
     */
    public function find($id)
    {
      return $this->queryBuilder->findById($this->table,$id);
    }

    /**
     * Metodo responsavel por retornar um id especifico
     */
    public function where($field, $value)
    {
      return $this->queryBuilder->findBy($this->table,$field,$value);
    }

    public function save($values){
      return $this->queryBuilder->insert($this->table, $values);
    }

  }
