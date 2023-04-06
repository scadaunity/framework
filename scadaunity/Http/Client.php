<?php

namespace ScadaUnity\Http;

class Client
{
    /**
     * Url da requisição http;
     */
    private static $url;

    /**
     * Metodo da requisição
     */
    private static $method;

    /**
     * Tempo para executar a requisição
     */
    private static $timeout = 2;

    /**
     * Instancia do curl;
     */
    private static $curl;

    /**
     * Armazena os dados da requisição
     */
    private static $data;

    public function __construct()
    {
        
    }

    public static function request(string $method,string $url)
    {
        $response = '';
        self::init();
        curl_setopt_array(self::$curl,[
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_RETURNTRANSFER => true
        ]);

        $response = curl_exec(self::$curl);
        self::close();

        return $response;

    }

    public static function init()
    {
        self::$curl = curl_init();
    }

    public static function close()
    {
        curl_close(self::$curl);
    }

    public static function get(string $url = '',)
    {
        return self::request('GET',$url);

    }
}