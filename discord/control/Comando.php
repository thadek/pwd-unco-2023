<?php

abstract class Comando implements IComando{

    protected $nombre;
    protected $descripcion;
    protected $discord;
    protected $opciones;


    public function __construct($nombre, $descripcion,$discord, $opciones = []) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->discord = $discord;
        $this->opciones = $opciones;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDiscord() {
        return $this->discord;
    }

    public function setDiscord($discord) {
        $this->discord = $discord;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getOpciones(){
        return $this->opciones;
    }

    public function setOpciones($opciones){
        $this->opciones = $opciones;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public abstract function ejecutar($message, $params);
}