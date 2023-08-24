<?php

class Persona {

    private $nombre;
    private $apellido;
    private $edad;
    private $direccion;
    private $genero;
    private $estudios;
    private $deportes;


    public function __construct(){
    $this->nombre = "";
    $this->apellido = "";
    $this->edad = 0;
    $this->direccion = "";
    $this->genero = "";
    $this->estudios = "";
    $this->deportes = [];
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function getEstudios(){
        return $this->estudios;
    }

    public function getDeportes(){
        return $this->deportes;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setEdad($edad){
        $this->edad = $edad;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function setEstudios($estudios){
        $this->estudios = $estudios;
    }

    public function setDeportes($deportes){
        $this->deportes = $deportes;
    }

    public function agregarDeporte($deporte){
        array_push($this->deportes,$deporte);
    }

    public function mostrarDeportes(){
        $deportes = $this->deportes;
        $deportes = implode(", ",$deportes);
        return $deportes;
    }


    public function isMayorEdad(){
        $retorno = false;
        if($this->edad >= 18){
            $retorno = true;
        }
        return $retorno;
    }


    public static function isEstudiante($persona){
        $retorno = false;
        if($persona instanceof Estudiante){
            $retorno = true;
        }
        return $retorno;
    }

    public static function calcularEntradaCine($persona){
        $costoEntrada = 0;
        $estudiante = Persona::isEstudiante($persona);
        if($persona->getEdad() >=12 && $estudiante){
            $costoEntrada = 180;
        }else if($persona->getEdad()< 18 || $estudiante){
            $costoEntrada = 160;
        }else{
            $costoEntrada = 300;
        }
        return $costoEntrada;
    }

    

}