<?php

putenv("doug");

function env($index = null , $value = null){
  // se nenhum parametro for passado retorna todas as variaveis
  if ($index == null && $value == null) {
    return getenv( );
  }

  // se for passado o parametro index
  if (!$index == null) {
    return getenv($index);
  }
}

dd(env());
