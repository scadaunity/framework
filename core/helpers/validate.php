<?php

/**
 * Metodo responsavel por realizar ar validações
 * @param  array $validations
 * @return $fields or null
 */
function validate($validations){
  /** Armazena os testes */
  $result = [];

  /** Executa as validações */
  foreach ($validations as $field => $validate) {
    /** Verifica se é uma validação simples */
    if (!str_contains($validate, '|')) {
      $result[$field] = $validate($field);
    }
  }

  /** Retorna falso se uma validação for falso */
  if (in_array(false, $result)) {
    return false;
  }

  /** Se a validação passar retorna a validação */
  return $result;
}

function required($field){
  if ($_POST[$field] === '') {
    echo("O campo {$field} é obrigatório");
    setFlash($field,"O campo {$field} é obrigatório");
    return false;
  }

  return filter_input(INPUT_POST,$field,FILTER_SANITIZE_STRING);
}
