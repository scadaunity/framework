<?php

namespace ScadaUnity\Suport;

class Auth
{
    /**
     * Metodo responsavel por checar se o usuario esta logado
     * @return bool
     */
    public static function check() : bool
    {
        if (!isset($_SESSION[LOGGED]))
        {
            return false;
        }
        return true;
    }

    /**
     * Metodo responsavel por retornar o usuario autenticado
     * @return User
     */
    public static function user()
    {
        if (isset($_SESSION[LOGGED])) {
            //retorna o usuario logado
            return $_SESSION[LOGGED];
        }
    }
}
