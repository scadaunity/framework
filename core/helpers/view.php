<?php

use Core\Http\Request;
use Core\Http\Response;
use Core\View\View;

/**
 * Metodo responsavel por incluir arquivos da view
 * @param  string $view
 * @param  array $data
 * @return string
 */
function view($view, $data = []){

    View::view($view,$data);
}

/**
 * Metodo responsavel por renderizar a view arquivos da view
 * @param  string $view
 * @param  array $data
 * @return string
 */
function render($view, $data = []){
    View::render($view,$data);
}

/**
 * Metodo responsavel por adicionar componentes a view
 * @param  string $component
 * @param  array $data
 * @return string
 */
function component($component, $data = []){
    $view = 'components/'.$component;
    
    View::view($view,$data);
}
