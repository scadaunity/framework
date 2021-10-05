<?php

/**
 * Metodo responsavel por retornar variaveis de ambiente
 * @param  [type] $index
 * @param  [type] $value
 * @return [type]
 */
function env($index = null){
  // se nenhum parametro for passado retorna todas as variaveis
  if ($index == null) {
    return getenv( );
  }

  // se for passado o parametro index
  if (!$index == null) {
    return getenv($index);
  }
}
