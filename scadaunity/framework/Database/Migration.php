<?php

namespace ScadaUnity\Framework\Database;

/**
 *  Classe responsavel por realizar a migrações no bancode dados
 */
class Migration
{
    /**
    * Mapeamento das migrações
    * @var array
    */
    private $map = [];

    /**
     * Diretório contendo os arquivos das migrações.
     * @var string
     */
    private $path;

    /**
     * Construtor da classe
     */
    public function __construct()
    {
        $this->path = ROOT.'/app/Database/Migrations/';
        $this->setMap();
    }

    /**
     * Metodo responsavel por mapear os arquivos de migração na pasta app/Database/Migrations.
     */
    public function setMap(){
    
        //VERIFICA SE EXISTE O DIRETÓRIO
        if(!is_dir($this->path)){
            return false;
        }

        //PROCURA OS ARQUIVOS DENTRO DO DIRETORIO
        $migrations = array_diff(
            scandir($this->path),
            ['.', '..']
        );

        //DEFINE O MAPA DAS MIGRAÇÕES COM O CAMINHO ABSOLUTO
        foreach ($migrations as $migration) {
            array_push($this->map,$this->path.$migration);
        }
    }

    public function migrate(){
        

        // VERIFICA SE A FILA ESTA VAZIA
        if (empty($this->map)) return false;

        // EXECUTA AS MIGRAÇÕES
        foreach ($this->map as $migration) {
            $file = require $migration;
            $file->up();
        }
    }

    public function rollback(){

        // VERIFICA SE A FILA ESTA VAZIA
        if (empty($this->map)) return false;

        // EXECUTA AS MIGRAÇÕES
        foreach ($this->map as $migration) {
            $file = require $migration;
            $file->down();
        }
    }


}
