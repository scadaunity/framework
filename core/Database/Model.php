<?php
  namespace App\Models;


  class Model
  {

    /**
     * Nome da tabela
     * @var string
     */
    protected $table;

    /**
     * Construtor da classe
     */
    function __construct()
    {
      $this->db = new Database();
    }

  }
