<?php

use UnitConverter\UnitConverter;

class Conversion {

    private $valorIngresado;
    private $unidadEntrante;
    private $unidadSalida;
    private $valorFinal;
    
    public function __construct($valorIngresado, $unidadEntrante, $unidadSalida, $valorFinal)
    {
        $this->valorIngresado = $valorIngresado;
        $this->unidadEntrante = $unidadEntrante;
        $this->unidadSalida = $unidadSalida;
        $this->valorFinal = $valorFinal;
    }

    //getters
    public function getValorIngresado(){
        return $this->valorIngresado;
    }

    public function getUnidadEntrante(){
        return $this->unidadEntrante;
    }

    public function getUnidadSalida(){
        return $this->unidadSalida;
    }

    public function getValorFinal(){
        return $this->valorFinal;
    }

    //setters

    public function setValorIngresado($valorIngresado){
        $this->valorIngresado = $valorIngresado;
    }

    public function setUnidadEntrante($unidadEntrante){
        $this->unidadEntrante = $unidadEntrante;
    }

    public function setUnidadSalida($unidadSalida){
        $this->unidadSalida = $unidadSalida;
    }

    public function setValorFinal($valorFinal){
        $this->valorFinal = $valorFinal;
    }

    public function cambioUnidad(){

        $converter = UnitConverter::default();

        $valorIngresado = $this->getValorIngresado();
        $unidadEntrante = $this->getUnidadEntrante();
        $unidadSalida = $this->getUnidadSalida();
        $valorFinal2 = 0;

        $valorFinal2 = $converter->convert($valorIngresado)->from($unidadEntrante)->to($unidadSalida);

        $this->setValorFinal($valorFinal2);

        $valorFinal = $this->getValorFinal();

        return $valorFinal;

    }

}