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

  // Verifica se alguma validação foi falsa
  if (in_array(false, $result)) {
    return false;
  }

  // Se não existir nenhum falso continua
  return $result;
}

/**
 * Metodo responsavel por verificar um campo obrigatorio
 * @param  string $field
 * @return string $field
 */
function required($field){

  if ($_POST[$field] === '') {
    setFlash($field,"O campo {$field} é obrigatório");
    return false;
  }

  return strip_tags($field);
}

/**
 * Metodo responsavel por validar se o email é valido
 * @param  string $field
 * @return string $field
 */
function email($field){
  $validate = filter_input(INPUT_POST,$field,FILTER_VALIDATE_EMAIL);

  if(!$validate){
    setFlash($field,"O campo {$field} não é um email valido");
    return false;
  }

  return strip_tags($field);
}

/**
 * Metodo responsavel por validar se o valor é unico
 * @param  string $field
 * @param  string $param
 * @return string $field
 */
function unique($field,$param){
  $value = $field;
  $db = new QueryBuilder();
  $result = $db->findBy($param, $field, $value);

  if ($result) {
    setFlash($field,"O {$field} ja existe.");
    return false;
  }

  return $value;

}

/**
 * Metodo responsavel por verificar a quantidade maxima de caracteres.
 * @param  string $field
 * @param  string $param
 * @return string $field
 */
function maxlength($field,$param){
  if (strlen($_POST[$field]) > $param) {
    setFlash($field,"O campo {$field} não pode ter mais de {$param} caracteres.");
    return false;
  }
  return filter_input(INPUT_POST,$field,FILTER_SANITIZE_STRING);
}

/**
 * Metodo responsavel por verificar a quantidade minima de caracteres.
 * @param  string $field
 * @param  string $param
 * @return string $field
 */
function minlength($field,$param){
  if (strlen($_POST[$field]) < $param) {
    setFlash($field,"O campo {$field} não pode ter menos de {$param} caracteres.");
    return false;
  }

  return filter_input(INPUT_POST,$field,FILTER_SANITIZE_STRING);
}

/**
 * Metodo verificar um campo obrigatorio
 * @param  string $field
 * @return string $field
 */
function bool($field){
    // VERIFICA SE É DO TIPO STRING
    if(is_string($_POST[$field])){
        if ($_POST[$field] === 'true') {
            return true;
        }
        if ($_POST[$field] === 'false') {
            return true;
        }
        setFlash($field,"O campo {$field} deve ser boleano");
        return false;
    }
}
