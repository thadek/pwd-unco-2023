<?php

class Tiempo {

    private $horas;

public function __construct(){
    $this->horas = 0;
}

public function getHoras(){
    return $this->horas;
}



public function setHoras($horas){
    $this->horas = $horas;
}


public static function sumarHoras($lun,$mar,$mie,$jue,$vie){
    $horas = 0;
    $horas = $lun + $mar + $mie + $jue + $vie;
    return $horas;
}



}