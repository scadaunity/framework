<?php

use ScadaUnity\Http\Request;
use ScadaUnity\Http\Response;
use ScadaUnity\View\View;

/**
 * Metodo responsavel por incluir arquivos da view
 * @param  string $view
 * @param  array $data
 * @return string
 */
function view(string $view, array $data = [])
{
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

function layout(string $view, array $data,string $layout){

    $data['page'] = $view;
    extract($data);
    require_once(VIEWS.'//layouts/'.$layout.'.php');
    
}