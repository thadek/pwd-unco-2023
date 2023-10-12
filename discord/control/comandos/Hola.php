<?php

class Hola extends Comando{

    public function __construct(){
        parent::__construct('hola', 'Saluda al usuario');
    }

    public function ejecutar($message, $params){
        return function($message, $params){
            $message->reply('Hola '.$message->author->username);
        };
    } 
    
}

