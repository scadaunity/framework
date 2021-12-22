<?php

use ScadaUnity\Framework\Database\QueryBuilder;

/**
 * Metodo responsavel por realizar ar validações
 * @param  array $validations
 * @return $fields or null
 */
function validate($validations){

  $result = [];
  $param = '';

  foreach ($validations as $field => $validate) {

    /** Verifica se é uma validação simples */
    if (!str_contains($validate, '|')) {

      /** Verifica se possui parametros */
      if(str_contains($validate, ':')){
        [$validate,$param] = explode(':', $validate);

      }

      $result[$field] = $validate($field, $param);
    }

    /** Verifica se é uma validação composta */
    if (str_contains($validate, '|')) {
      $explodeValidate = explode('|', $validate);
      foreach ($explodeValidate as $validate) {

        /** Verifica se possui parametros */
        if(str_contains($validate, ':')){
          [$validate,$param] = explode(':', $validate);

        }
        $result[$field] = $validate($field, $param);
      }
    }

  } //end foreach



  if (in_array(false, $result)) {
    return false;
  }

  return $result;
}

/**
 * Metodo responsavel por validar se existe o campo no post
 * @param  string $field
 * @return string $field
 */
function required($field){

  if ($_POST[$field] === '') {
    setFlash($field,"O campo {$field} é obrigatório");
    return false;
  }

  return filter_input(INPUT_POST,$field,FILTER_SANITIZE_STRING);
}

/**
 * Metodo responsavel por validar se o email é valido
 * @param  string $field
 * @return string $field
 */
function email($field){
  $validate = filter_input(INPUT_POST,$field,FILTER_VALIDATE_EMAIL);

  if(!$validate){
    setFlash($field,"O campo não é um email valido");
    return false;
  }

  return filter_input(INPUT_POST,$field,FILTER_SANITIZE_STRING);
}

/**
 * Metodo responsavel por validar se o valor é unico
 * @param  string $field
 * @param  string $param
 * @return string $field
 */
function unique($field,$param){
  $value = filter_input(INPUT_POST,$field,FILTER_SANITIZE_STRING);
  $db = new QueryBuilder();
  $result = $db->findBy($param, $field, $value);

  if ($result) {
    setFlash($field,"O valor ja esta em uso");
    return false;
  }

  return $value;

}
