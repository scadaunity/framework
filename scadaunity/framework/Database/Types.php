<?php

namespace ScadaUnity\Framework\Database;

class Types
{
    /**
     * Colunas da tabela
     * @var array
     */
    public $fields = [];

    public function id()
    {
        array_push($this->fields,'id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY');
        return $this;
    }

    public function string(string $name, int $length = 255)
    {
        array_push($this->fields,"{$name} VARCHAR({$length})");
        return $this;
    }

}
