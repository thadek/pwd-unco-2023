<?php



class Usuario{
    private $idUsuario;
    private $usNombre;
    private $usPass;
    private $usMail; 
    private $usDeshabilitado;
    private $mensajeoperacion;

    public function __construct(){

        $this->idUsuario = "";
        $this->usNombre = "";
        $this->usPass = "";
        $this->usMail = "";
        $this->usDeshabilitado = "";
        $this->mensajeoperacion = "";
        
    }

    public function cargar($idUsuario, $usNombre, $usPass, $usMail, $usDeshabilitado){
        $this->setidUsuario($idUsuario);
        $this->setusNombre($usNombre);
        $this->setusPass($usPass);
        $this->setusMail($usMail);
        $this->setusDeshabilitado($usDeshabilitado);
    }

    //setters

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function setUsNombre($usNombre){
        $this->usNombre = $usNombre;
    }

    public function setUsPass($usPass){
        $this->usPass = $usPass;
    }

    public function setUsMail($usMail){
        $this->usMail = $usMail;
    }

    public function setUsDeshabilitado($usDeshabilitado){
        $this->usDeshabilitado = $usDeshabilitado;
    }

    public function setMensajeoperacion($mensajeoperacion){
        $this->mensajeoperacion = $mensajeoperacion;
    }

    //getters

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function getUsNombre(){
        return $this->usNombre;
    }

    public function getUsPass(){
        return $this->usPass;
    }

    public function getUsMail(){
        return $this->usMail;
    }

    public function getUsDeshabilitado(){
        return $this->usDeshabilitado;
    }

    public function getMensajeoperacion(){
        return $this->mensajeoperacion;
    }

    public function buscar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario WHERE idUsuario = ".$this->getIdUsuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->cargar($row['idUsuario'], $row['usNombre'], $row['usPass'], $row['usMail'], $row['usDeshabilitado']);
                    
                }
            }
        } else {
            $this->setMensajeOperacion("Usuario->listar: ".$base->getError());
        }
        return $resp;
    
        
    }

    public function insertar(){
		$base = new BaseDatos();
		$resp = false;
		$sql = "INSERT INTO usuario(idUsuario, usNombre, usPass, usMail, usDeshabilitado)
				VALUES (".$this->getIdUsuario().",'".$this->getUsNombre()."','".$this->getUsPass()."','".$this->getUsMail()."','".$this->getUsDeshabilitado()."')";
        if ($base->Iniciar()) {

			if($idUsuario = $base->devuelveIDInsercion($sql)){

                $this->setIdUsuario($idUsuario);
			    $respuesta = true;

			} else {
                $this->setmensajeoperacion($base->getError());	
			}
        } else {
            $this->setMensajeOperacion("Usuario->insertar: ".$base->getError());
        }
        return $respuesta;
    }

    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql="UPDATE usuario SET usNombre='".$this->getUsNombre()."', usPass='".$this->getUsPass()."', 
        usMail='".$this->getUsMail()."', usDeshabilitado='".$this->getUsDeshabilitado().
        "'  WHERE idUsuario=".$this->getIdUsuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Usuario->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Usuario->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql="DELETE FROM usuario WHERE idUsuario=".$this->getIdUsuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Usuario->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Usuario->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public static function listar($parametro=""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Usuario();
                    $obj->cargar($row['idUsuario'], $row['usNombre'], $row['usPass'], $row['usMail'], $row['usDeshabilitado']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setMensajeOperacion("Usuario->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    




}