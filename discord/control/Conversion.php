<?php
use UnitConverter\UnitConverter;
class Conversion {

    private $valorIngresado;
    private $unidadEntrante;
    private $unidadSalida;

    
    public function __construct($valorIngresado, $unidadEntrante, $unidadSalida)
    {
        $this->valorIngresado = $valorIngresado;
        $this->unidadEntrante = $unidadEntrante;
        $this->unidadSalida = $unidadSalida;
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

    public function verificarUnidades($unidadEntrada, $unidadSalida){
        $verificar = false;

        $unidades = [
        't', 'kg', 'g', 'mg', 'lbs', 'oz', 'k', 'c', 'f', 
        'km', 'm', 'dm', 'cm', 'mm', 'in', 'ft', 'yd', 'mi', 'nmi'
        ];

        $indice = 0;
        $indice2 = 0;
        while ($indice < count($unidades)) {

            if ($unidades[$indice] == $unidadEntrada) {

                while($indice2 < count($unidades)){

                    if($unidades[$indice2] == $unidadSalida){

                        $verificar = true;
                    }

                    $indice2++;
                }
                break; // Puedes detener el bucle una vez que se haya encontrado el valor
            }
            $indice++;
        }
        return $verificar;
    }

}