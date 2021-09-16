<?php
  namespace App\Models;


  class Model
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

  }
