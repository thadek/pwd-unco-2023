<?php

class Rol {

private $idrol;
private $roldescripcion;
private $mensajeOperacion;

public function __construct(){
    $this->idrol = 0;
    $this->roldescripcion = "";
    $this->mensajeOperacion = "";
}

public function cargar($idrol, $roldescripcion){
    $this->setIdRol($idrol);
    $this->setRolDescripcion($roldescripcion);
}

public function getIdRol(){
    return $this->idrol;
}

public function setIdRol($idrol){
    $this->idrol = $idrol;
}

public function getRolDescripcion(){
    return $this->roldescripcion;
}

public function setRolDescripcion($roldescripcion){
    $this->roldescripcion = $roldescripcion;
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
    $sql = "SELECT * FROM rol WHERE idrol = " . $this->getIdRol();
    if ($base->Iniciar()) {
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                $row = $base->Registro();
                $this->cargar($row['idrol'], $row['roldescripcion']);
                $resp = true;
            }
        }
    } else {
        $this->setMensajeOperacion("Rol->buscar: " . $base->getError());
    }
    return $resp;
}

public function insertar(){
    $resp = false;
    $base = new BaseDatos();
    $sql = "INSERT INTO rol(idrol, roldescripcion) VALUES (" . $this->getIdRol() . ", '" . $this->getRolDescripcion() . "')";
    if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeOperacion("Rol->insertar: " . $base->getError());
        }
    } else {
        $this->setMensajeOperacion("Rol->insertar: " . $base->getError());
    }
    return $resp;
}

public function modificar(){
    $resp = false;
    $base = new BaseDatos();
    $sql = "UPDATE rol SET roldescripcion = '" . $this->getRolDescripcion() . "' WHERE idrol = " . $this->getIdRol();
    if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeOperacion("Rol->modificar: " . $base->getError());
        }
    } else {
        $this->setMensajeOperacion("Rol->modificar: " . $base->getError());
    }
    return $resp;
}

public function eliminar(){
    $resp = false;
    $base = new BaseDatos();
    $sql = "DELETE FROM rol WHERE idrol = " . $this->getIdRol();
    if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeOperacion("Rol->eliminar: " . $base->getError());
        }
    } else {
        $this->setMensajeOperacion("Rol->eliminar: " . $base->getError());
    }
    return $resp;
}

public static function listar($parametro = ""){
    $arreglo = array();
    $base = new BaseDatos();
    $sql = "SELECT * FROM rol";
    if ($parametro != "") {
        $sql .= ' WHERE ' . $parametro;
    }
    $res = $base->Ejecutar($sql);
    if ($res > -1) {
        if ($res > 0) {
            while ($row = $base->Registro()) {
                $obj = new Rol();
                $obj->cargar($row['idrol'], $row['roldescripcion']);
                array_push($arreglo, $obj);
            }
        }
    } else {
        $this->setMensajeOperacion("Rol->listar: " . $base->getError());
    }
    return $arreglo;
}
}