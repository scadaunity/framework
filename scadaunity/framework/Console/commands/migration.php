<?php

use ScadaUnity\Framework\Database\Forge;

if ($argv[1] == 'create:migration') {
    logo();
  echo "    # Criando migration #".PHP_EOL;

  // Verifica se foi passado o nome da migration
  if (!isset($argv[2])) {
    echo "Informe o nome do controller".PHP_EOL;
    die('Não foi passado o nome do controller no segundo parametro.'.PHP_EOL);
  }

  //Cria o nome do arquivo
  $name = date('Y_m_d_his', time()).'_'.$argv[2].PHP_EOL;
  echo $name.PHP_EOL;

  //Adiciona o caminho completo do arquivo
  $file = ROOT.'/app/Database/Migrations/'.$name.'.php';
  echo $file.PHP_EOL;

  // Verifica se o arquivo existe
  if (is_file($file)) {
    echo 'O arquivo jaexiste'.PHP_EOL;
  } else {
    echo "Arquivo não existe".PHP_EOL;
  }

  // Ignora nomes que não são da tabela
  $ignoredNames = [
    'create','table','add','field','to'
  ];

  // Recupera os nomes passados
  $avaliableNames = explode('_',$argv[2]);

  foreach ($avaliableNames as $name) {
    echo $name.PHP_EOL;
  }
  
  $tableName = '';

  
  var_dump($tableName);

  die();
  // Cria o arquivo
  $arquivo = fopen($file,'w');

  // Verifica se o arquivo foi criado
  if ($arquivo == false) die('Não foi possível criar o arquivo.');

  fwrite($arquivo, '<?php'.PHP_EOL.PHP_EOL);
  fwrite($arquivo, 'namespace App\Database\Migrations;'.PHP_EOL.PHP_EOL);
  fwrite($arquivo, 'use ScadaUnity\Framework\Database\Forge;'.PHP_EOL.PHP_EOL);
  fwrite($arquivo, "return new class".PHP_EOL);
  fwrite($arquivo, "{".PHP_EOL);
    
  /** Cria o metodo up */
  fwrite($arquivo, "  /**".PHP_EOL);
  fwrite($arquivo, "   * Metodo responsavel por executar a migração.".PHP_EOL);
  fwrite($arquivo, "   *".PHP_EOL);
  fwrite($arquivo, "   * @return void".PHP_EOL);
  fwrite($arquivo, "   */".PHP_EOL);
  fwrite($arquivo, "  public function up()".PHP_EOL);
  fwrite($arquivo, "  {".PHP_EOL);
  fwrite($arquivo, "    //".PHP_EOL);
  fwrite($arquivo, "  }".PHP_EOL.PHP_EOL);
  /** Cria o metodo down */
  fwrite($arquivo, "  /**".PHP_EOL);
  fwrite($arquivo, "   * Metodo responsavel por reverter a migração.".PHP_EOL);
  fwrite($arquivo, "   *".PHP_EOL);
  fwrite($arquivo, "   * @return void".PHP_EOL);
  fwrite($arquivo, "   */".PHP_EOL);
  fwrite($arquivo, "  public function down()".PHP_EOL);
  fwrite($arquivo, "  {".PHP_EOL);
  fwrite($arquivo, "    //".PHP_EOL);
  fwrite($arquivo, "  }".PHP_EOL.PHP_EOL);
  
  /** Fim da classe */
  fwrite($arquivo, "}".PHP_EOL);
  /** Fecha o arquivo */
  fclose($arquivo);
}
