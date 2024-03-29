<?php

namespace ScadaUnity\Database;

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
    }

    /**
     * Metodo responsavel por adicionar a colection um campo do varchar.
     * @param string $name Nome do campo.
     * @param int $length Tamanho do campo.
     */
    public static function string(string $name, int $length = 255)
    {
        array_push(self::$fields,"{$name} VARCHAR({$length})");
    }

     /**
     * Metodo responsavel por adicionar a colection um campo do tipo inteiro.
     * @param string $name Nome do campo.
     * @param int $length Tamanho do campo.
     */
    public static function int(string $name, int $length = 11)
    {
        array_push(self::$fields,"{$name} INT({$length})");
    }

    /**
     * Metodo responsavel por adicionar a colection um campo do tipo inteiro.
     * @param string $name Nome do campo.
     * @param int $length Tamanho do campo.
     */
    public static function null(string $name, int $length = 11)
    {
        array_push(self::$fields,"{$name} INT({$length})");
    }

    /**
     * Metodo responsavel por adicionar a tabela tres campos [created_at, updated_at, deleted_at].
     */
    public static function timestamps()
    {
        array_push(self::$fields,"created_at TIMESTAMP");
        array_push(self::$fields,"updated_at TIMESTAMP");
        array_push(self::$fields,"deleted_at TIMESTAMP");
    }
    

}
