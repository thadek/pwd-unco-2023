<?php

include_once("Persona.php");

class Estudiante extends Persona {

    private $facultad;


public function __construct(){
    parent::__construct();
    $this->facultad = "";
}

public function getFacultad(){
    return $this->facultad;
}

public function setFacultad($facultad){
    $this->facultad = $facultad;

}



}