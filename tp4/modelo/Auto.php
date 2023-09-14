<?php

class Auto {

    private $patente;
    private $marca;
    private $modelo;
    private $dniDuenio;
    private $mensajeOperacion;

    public function __construct(){
        $this->patente="";
        $this->marca="";
        $this->modelo="";
        $this->dniDuenio="";
        $this->mensajeOperacion ="";
    }

    public function cargar($patente, $marca, $modelo, $dniDuenio){
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setDniDuenio($dniDuenio);
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

    public function getDniDuenio(){
        return $this->dniDuenio;
    }

    public function setDniDuenio($dniDuenio){
        $this->dniDuenio = $dniDuenio;
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
                    $this->cargar($row['patente'], $row['marca'], $row['modelo'], $row['dniDuenio']);
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
        $sql="INSERT INTO auto(patente, marca, modelo, dniDuenio)  VALUES ('".$this->getPatente()."','".$this->getMarca()."','".$this->getModelo()."','".$this->getDniDuenio()."')";
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
        return $resp;
    }

    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE auto SET marca = '".$this->getMarca()."',modelo='".$this->getModelo()."',
        dniDuenio='".$this->getDniDuenio()."' WHERE patente=". $this->getPatente();
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
                    $obj= new auto();
                    $obj->cargar($row['patente'], $row['marca'], $row['modelo'], $row['dniDuenio']);
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