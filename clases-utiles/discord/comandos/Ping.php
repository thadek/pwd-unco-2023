<?php

class Ping extends Comando{

    public function __construct(){
        parent::__construct('ping', 'Devuelve pong');
    }

    public function ejecutar($message, $params){
        return function($message, $params){
            $message->reply("PONG!");
        };
    }
}