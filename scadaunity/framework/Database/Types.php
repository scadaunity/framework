<?php

namespace ScadaUnity\Framework\Database;

class Types
{
    /**
     * Colunas da tabela
     * @var array
     */
    public static $fields = [];

    public static function id()
    {
        array_push(self::$fields,'id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY');
        return self::$fields;
    }

    public static function string(string $name, int $length = 255)
    {
        array_push(self::$fields,"{$name} VARCHAR({$length})");
        return self::$fields;
    }
    

}
