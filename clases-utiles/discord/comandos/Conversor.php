<?php

require 'vendor/autoload.php';

use UnitConverter\UnitConverter;

//crea un convertidor;
$converter = UnitConverter::default();

class Conversor extends Comando{

    public function __construct()
    {
        parent::__construct('convertir', 'Convierte el tipo de unidad de un valor a otra unidad');
    }


    
}