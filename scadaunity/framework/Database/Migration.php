<?php

namespace ScadaUnity\Framework\Database;

use FilesystemIterator;
use ScadaUnity\Framework\Database\Schema;

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
     * Construtor da classe
     */
    public function __construct()
    {
        $this->loadMigrations();
        //var_dump($this->map);
    }

    /**
     * Metodo responsavel por verificar os arquivos de migração na pasta app/Database/Migrations.
     */
    public function loadMigrations(){
        //CAMINHO DAS MIGRAÇÕES
        $path = ROOT.'/app/Database/Migrations';

        //VERIFICA SE EXISTE O DIRETÓRIO
        if(!is_dir($path)){
            return false;
        }

        //PROCURA OS ARQUIVOS DENTRO DO DIRETORIO
        $migrations = array_diff(
            scandir($path),
            ['.', '..']
        );

        //DEFINE O MAPA DAS MIGRAÇÕES
        foreach ($migrations as $migration) {
            array_push($this->map,$migration);
        }
    }

    public function up(){
        foreach ($this->map as $migration) {
            var_dump($migration);
            // Executa a migração
            return (new $this->map[$migration])->up();
        }
    }


}
