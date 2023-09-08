<?php

class Pelicula {

   private $titulo;  //= $_POST['titulo_form'];
   private $actores;  //= $_POST['actores_form'];
   private $director;  //= $_POST['director_form'];
   private $guion;  //= $_POST['guion_form'];
   private $produccion;  //= $_POST['produccion_form'];
   private $anio;  //= $_POST['anio_form'];
   private $nacionalidad;  //= $_POST['nacionalidad_form'];
   private $genero;  //= $_POST['genero_form'];
   private $duracion;  //= $_POST['duracion_form'];
   private $resEdad;  //= $_POST['resEdad_form'];
   private $sinopsis;  //= $_POST['sinopsis_form'];
   private $imagen;  //= $_POST['imagen_form'];

   public function __construct(){

   }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setActores($actores){
        $this->actores = $actores;
    }

    public function getActores(){
        return $this->actores;
    }

    public function setDirector($director){
        $this->director = $director;
    }

    public function getDirector(){
        return $this->director;
    }

    public function setGuion($guion){
        $this->guion = $guion;
    }

    public function getGuion(){
        return $this->guion;
    }

    public function setProduccion($produccion){
        $this->produccion = $produccion;
    }

    public function getProduccion(){
        return $this->produccion;
    }

    public function setAnio($anio){
        $this->anio = $anio;
    }

    public function getAnio(){
        return $this->anio;
    }

    public function setNacionalidad($nacionalidad){
        $this->nacionalidad = $nacionalidad;
    }

    public function getNacionalidad(){
        return $this->nacionalidad;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function setDuracion($duracion){
        $this->duracion = $duracion;
    }

    public function getDuracion(){
        return $this->duracion;
    }

    public function setResEdad($resEdad){
        $this->resEdad = $resEdad;
    }

    public function getResEdad(){
        return $this->resEdad;
    }

    public function setSinopsis($sinopsis){
        $this->sinopsis = $sinopsis;
    }

    public function getSinopsis(){
        return $this->sinopsis;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    public function getImagen(){
        return $this->imagen;
    }   

    
    public function devolverRestriccionEdad(){
        $textoEdad = "";
        switch ($this->getResEdad()){
            case 1:
                $textoEdad = "Todo p&uacute;blico";
                break;
            case 2:
                $textoEdad = "Mayores de 7 a&ntilde;os";
                break;
            case 3:
                $textoEdad = "Mayores de 18 a&ntilde;os";
                break;
        }
        return $textoEdad;
    }







} 