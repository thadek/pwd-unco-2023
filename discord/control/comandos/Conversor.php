<?php

class Conversor extends Comando {
    

    public function __construct()
    {
        parent::__construct('convertir', 'Convierte el tipo de unidad de un valor a otra unidad',null);
    }

    public function ejecutar($message, $params)
    {
        return function ($message, $params) {
            $message->channel->sendMessage('Hello World!');

        };

        
    }

    
}