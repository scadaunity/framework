<?php

namespace ScadaUnity\View;

class Template
{
    
    /**
     * Variavel que armazena o arquivo de template;
     * 
     * @var string
     */
    private static string $content = '';

    /**
     * Armazena as variaveis compartilhadas
     */
    private static array $vars = [];

    /**
     * Armazena as chaves formatadas
     */
    private static $keys = [];

    /**
     * Metodo responsavel por renderizar a view
     * 
     * @param string $file Caminho do arquivo.
     * 
     * @param array $vars Variaveis passadas para a view.
     */
    public static function render(string $file, array $vars = [])
    {   
        // Registra as variaveis passadas.
        self::share($vars);

        // Compartilha as variaveis para codigo php puro
        extract(self::$vars);
        

        // Extrai as chaves para o template
        //self::assignKeys(self::$vars);

       // Pega o conteudo da view
        $content = self::getContent($file);

        // Converte as variaveis
        $content = self::parseVariables($content);

        self::response($content);
        
        
    }

    /**
     * Metodo responsavel por carregar o arquivo
     */
    public static function getContent($file)
    {
        return file_exists(VIEWS.$file.'.php') ? file_get_contents(VIEWS.$file.'.php') : '';
    }

    /**
     * Metodo responsavel por adicionar as variaveis a view
     */
    public static function share(array $vars)
    {   
        self::$vars = array_merge(self::$vars,$vars);
    }

    /**
     * Metodo responsavel por formatar as variaveis do template
     */
    private static function assignKeys($vars)
    {
        foreach($vars as $key => $value){
            if(is_array($value)){
                self::assignKeys($value);
            }else{
                self::$keys[$key] = $value;
            }   
        }
    }

    private static function parseVariables($content){
        // formata as variaveis
        $keys = array_map(function($var){
            return '{'.$var.'}';
        },array_keys(self::$vars));
        
        return str_replace($keys,array_values(self::$vars),$content);
    }

    private static function response(string $content){
        // Compartilha as variaveis para codigo php puro
        //extract(self::$vars);
        /*eval('?>'.$content.'<?php');*/
        $arr = [
            'users' => [
                ['id'=>1,'name'=>'Doug','email'=>'scadaunity@gmail.com'],
                ['id'=>2,'name'=>'Victória','email'=>'victoria@gmail.com']
            ],
        ];
        d($arr);
        echo'<br>';
        dd(compact('arr'));

    }

}