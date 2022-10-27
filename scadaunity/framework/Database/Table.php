<?php

namespace ScadaUnity\Framework\Database;

class Table
{
    /**
     * Colunas da tabela
     * @var array
     */
    public static $fields = [];

    /**
     * Metodo responsavel por adicionar a colection um campo do tipo id.
     */
    public static function id()
    {
        array_push(self::$fields,'id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY');
        return self::$fields;
    }

    /**
     * Metodo responsavel por adicionar a colection um campo do varchar.
     * @param string $name Nome do campo.
     * @param int $length Tamanho do campo.
     */
    public static function string(string $name, int $length = 255)
    {
        array_push(self::$fields,"{$name} VARCHAR({$length})");
        return self::$fields;
    }

     /**
     * Metodo responsavel por adicionar a colection um campo do tipo inteiro.
     * @param string $name Nome do campo.
     * @param int $length Tamanho do campo.
     */
    public static function int(string $name, int $length = 11)
    {
        array_push(self::$fields,"{$name} INT({$length}) NOT NULL");
        return self::$fields;
    }
    

}
