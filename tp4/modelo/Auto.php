<?php

class Auto {

    private $patente;
    private $marca;
    private $modelo;
    private $duenio;
    private $mensajeOperacion;

    public function __construct(){
        $this->patente="";
        $this->marca="";
        $this->modelo="";
        $this->duenio=new Persona();
        $this->mensajeOperacion ="";
    }

    public function cargar($patente, $marca, $modelo, $duenio){
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setDuenio($duenio);
    }

    public function getPatente(){
        return $this->patente;
    }

    public function setPatente($patente){
        $this->patente = $patente;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function getDuenio(){
        return $this->duenio;
    }

    public function setDuenio($duenio){
        $this->duenio = $duenio;
    }

    public function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }

    public function setMensajeOperacion($mensajeOperacion){
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function buscar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto WHERE patente = ".$this->getPatente();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $duenio = new Persona();
                    $duenio->setNroDni($row['dniDuenio']);
                    $duenio->buscar();
                    $this->cargar($row['patente'], $row['marca'], $row['modelo'], $duenio);
                    $resp = true;              
                }
            }
        } else {
            $this->setMensajeOperacion("auto->listar: ".$base->getError());
        }
        return $resp;
    
        
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        if($this->getDuenio() != null){
            $sql="INSERT INTO auto(patente, marca, modelo, dniDuenio)  VALUES ('".$this->getPatente()."','".$this->getMarca()."','".$this->getModelo()."','".$this->getDuenio()->getNroDni()."')";
            if ($base->Iniciar()) {
                if ($patente = $base->Ejecutar($sql)) {
                    $this->setPatente($patente);
                    $resp = true;
                } else {
                    $this->setMensajeoperacion("auto->insertar: ".$base->getError());
                }
            } else {
                $this->setMensajeoperacion("auto->insertar: ".$base->getError());
            }
        }
        
        return $resp;
    }

    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE auto SET marca = '".$this->getMarca()."',modelo='".$this->getModelo()."',
        dniDuenio='".$this->getDuenio()->getNroDni()."' WHERE patente='". $this->getPatente()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("auto->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("auto->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM auto WHERE patente=".$this->getPatente();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("auto->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("auto->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public static function listar($parametro=""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Auto();
                    $duenio = new Persona();
                    $duenio->setNroDni($row['dniDuenio']);
                    $obj->cargar($row['patente'], $row['marca'], $row['modelo'], $duenio);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setMensajeOperacion("auto->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
}

?>