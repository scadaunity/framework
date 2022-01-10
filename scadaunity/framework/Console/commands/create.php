<?php

if ($argv[1] == 'create:controller') {
  echo "# Criando controller #".PHP_EOL;

  // Verifica se foi passado o nome do controller
  if (!isset($argv[2])) {
    die('Não foi passado o nome do controller no segundo parametro.'.PHP_EOL);
  }

  // Verifica se foi passado o nome do controller
  $name = explode('Controller',$argv[2])[0];

  $arquivo = fopen(ROOT.'/app/Controllers/'.$argv[2].'.php','w');

  if ($arquivo == false) die('Não foi possível criar o arquivo.');


  fwrite($arquivo, '<?php'.PHP_EOL.PHP_EOL);
  fwrite($arquivo, 'namespace App\Controllers;'.PHP_EOL.PHP_EOL);
  fwrite($arquivo, 'use ScadaUnity\Framework\Http\Request;'.PHP_EOL.PHP_EOL);
  fwrite($arquivo, "class {$argv[2]}".PHP_EOL);
  fwrite($arquivo, "{".PHP_EOL);
  /** Cria o metodo index */
  fwrite($arquivo, "  /**".PHP_EOL);
  fwrite($arquivo, "   * Metodo responsavel por listar todos os registros.".PHP_EOL);
  fwrite($arquivo, "   *".PHP_EOL);
  fwrite($arquivo, "   * @return \ScadaUnity\Framework\Http\Response".PHP_EOL);
  fwrite($arquivo, "   */".PHP_EOL);
  fwrite($arquivo, "  public function index()".PHP_EOL);
  fwrite($arquivo, "  {".PHP_EOL);
  fwrite($arquivo, "    //".PHP_EOL);
  fwrite($arquivo, "  }".PHP_EOL.PHP_EOL);
  /** Cria o metodo create */
  fwrite($arquivo, "  /**".PHP_EOL);
  fwrite($arquivo, "   * Metodo responsavel por exibir o formulario para criação de um novo registro.".PHP_EOL);
  fwrite($arquivo, "   *".PHP_EOL);
  fwrite($arquivo, "   * @return \ScadaUnity\Http\Response".PHP_EOL);
  fwrite($arquivo, "   */".PHP_EOL);
  fwrite($arquivo, "  public function create()".PHP_EOL);
  fwrite($arquivo, "  {".PHP_EOL);
  fwrite($arquivo, "    //".PHP_EOL);
  fwrite($arquivo, "  }".PHP_EOL.PHP_EOL);
  /** Cria o metodo store */
  fwrite($arquivo, "  /**".PHP_EOL);
  fwrite($arquivo, "   * Metodo responsavel por inserir um novo registro no banco de dados.".PHP_EOL);
  fwrite($arquivo, "   *".PHP_EOL);
  fwrite($arquivo, "   * @param \ScadaUnity\Http\Request \$request".PHP_EOL);
  fwrite($arquivo, "   * @param \App\Models\\".$name." $". strtolower($name).PHP_EOL);
  fwrite($arquivo, "   * @return \ScadaUnity\Http\Response".PHP_EOL);
  fwrite($arquivo, "   */".PHP_EOL);
  fwrite($arquivo, "  public function store(Request \$request, ".$name. " $". strtolower($name).")".PHP_EOL);
  fwrite($arquivo, "  {".PHP_EOL);
  fwrite($arquivo, "    //".PHP_EOL);
  fwrite($arquivo, "  }".PHP_EOL.PHP_EOL);
  /** Cria o metodo show */
  fwrite($arquivo, "  /**".PHP_EOL);
  fwrite($arquivo, "   * Metodo responsavel por exibir um registro especifico.".PHP_EOL);
  fwrite($arquivo, "   *".PHP_EOL);
  fwrite($arquivo, "   * @param \App\Models\\".$name.PHP_EOL);
  fwrite($arquivo, "   * @return \ScadaUnity\Http\Response".PHP_EOL);
  fwrite($arquivo, "   */".PHP_EOL);
  fwrite($arquivo, "  public function show($name"." $". strtolower($name).")".PHP_EOL);
  fwrite($arquivo, "  {".PHP_EOL);
  fwrite($arquivo, "    //".PHP_EOL);
  fwrite($arquivo, "  }".PHP_EOL);
  /** Cria o metodo edit */
  fwrite($arquivo, "  /**".PHP_EOL);
  fwrite($arquivo, "   * Metodo responsavel por exibir o formulario de edição de um registro.".PHP_EOL);
  fwrite($arquivo, "   *".PHP_EOL);
  fwrite($arquivo, "   * @param \App\Models\\".$name.PHP_EOL);
  fwrite($arquivo, "   * @return \ScadaUnity\Http\Response".PHP_EOL);
  fwrite($arquivo, "   */".PHP_EOL);
  fwrite($arquivo, "  public function edit($name"." $". strtolower($name).")".PHP_EOL);
  fwrite($arquivo, "  {".PHP_EOL);
  fwrite($arquivo, "    //".PHP_EOL);
  fwrite($arquivo, "  }".PHP_EOL);
  /** Cria o metodo update */
  fwrite($arquivo, "  /**".PHP_EOL);
  fwrite($arquivo, "   * Metodo responsavel por alterar um registro.".PHP_EOL);
  fwrite($arquivo, "   *".PHP_EOL);
  fwrite($arquivo, "   * @param \ScadaUnity\Http\Request \$request".PHP_EOL);
  fwrite($arquivo, "   * @param \App\Models\\".$name." $". strtolower($name).PHP_EOL);
  fwrite($arquivo, "   * @return \ScadaUnity\Http\Response".PHP_EOL);
  fwrite($arquivo, "   */".PHP_EOL);
  fwrite($arquivo, "  public function update(Request \$request, ".$name. " $". strtolower($name).")".PHP_EOL);
  fwrite($arquivo, "  {".PHP_EOL);
  fwrite($arquivo, "    //".PHP_EOL);
  fwrite($arquivo, "  }".PHP_EOL);
  /** Cria o metodo destroy */
  fwrite($arquivo, "  /**".PHP_EOL);
  fwrite($arquivo, "   * Metodo responsavel por excluir um registro.".PHP_EOL);
  fwrite($arquivo, "   *".PHP_EOL);
  fwrite($arquivo, "   * @param \App\Models\\".$name.PHP_EOL);
  fwrite($arquivo, "   * @return \ScadaUnity\Http\Response".PHP_EOL);
  fwrite($arquivo, "   */".PHP_EOL);
  fwrite($arquivo, "  public function destroy($name"." $". strtolower($name).")".PHP_EOL);
  fwrite($arquivo, "  {".PHP_EOL);
  fwrite($arquivo, "    //".PHP_EOL);
  fwrite($arquivo, "  }".PHP_EOL);
  /** Fim da classe */
  fwrite($arquivo, "}".PHP_EOL);
  /** Fecha o arquivo */
  fclose($arquivo);
}
