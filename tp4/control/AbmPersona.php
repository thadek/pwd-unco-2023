<?php


class AbmPersona {
    private $conexion;

    public function __construct(){
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Persona
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('nroDni',$param) && array_key_exists('apellido',$param) && array_key_exists('nombre',$param) && array_key_exists('fechaNac',$param) && array_key_exists('telefono',$param) && array_key_exists('domicilio',$param)){
            $obj = new Persona();
            $obj->cargar($param['nroDni'], $param['apellido'], $param['nombre'], $param['fechaNac'], $param['telefono'], $param['domicilio']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Persona
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['nroDni']) ){
            $obj = new Persona();
            $obj->cargar($param['nroDni'], null, null, null, null, null);
        }
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
     private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['nroDni']))
            $resp = true;
        return $resp;
    }

    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param['nroDni'] =null;
        $elObjtPersona = $this->cargarObjeto($param);
        if ($elObjtPersona!=null && $elObjtPersona->insertar()){
            $resp = true;
        }
        return $resp;
        
    }

    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtPersona = $this->cargarObjetoConClave($param);
            if ($elObjtPersona!=null and $elObjtPersona->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtPersona = $this->cargarObjeto($param);
            if($elObjtPersona!=null and $elObjtPersona->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['nroDni']))
                $where.=" and nroDni =".$param['nroDni'];
            if  (isset($param['apellido']))
                $where.=" and apellido ='".$param['apellido']."'";
            if  (isset($param['nombre']))
                $where.=" and nombre =".$param['nombre'];
            if  (isset($param['fechaNac']))
                $where.=" and fechaNac =".$param['fechaNac'];
            if  (isset($param['telefono']))
                $where.=" and telefono =".$param['telefono'];
            if  (isset($param['domicilio']))
                $where.=" and domicilio =".$param['domicilio'];
        }
        $arreglo = Persona::listar($where);  
        return $arreglo;
    }

     //Obtener todas las personas
     public function obtenerTodasLasPersonas() {
        $personas = Persona::listar();
        return $personas;
     }

   
     // Obtener persona por dni
     public function obtenerDatosPersona($nroDni) {
        $personas = Persona::listar("nroDni = '" . $nroDni . "'");
        $salida = "";
        if (count($personas) > 0) {
            $salida = $personas[0];
        } else {
            $salida = null;
        }
        return $salida;
    }



    public function agregarNuevaPersona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio) {
        $salida = "";
        if (!($this->obtenerDatosPersona($nroDni) !== null)) {
            try {
                $objPersona = new Persona();
                $objPersona->setDni($nroDni);
                $objPersona->setApellido($apellido);
                $objPersona->setNombre($nombre);
                $objPersona->setFechaNac($fechaNac);
                $objPersona->setTelefono($telefono);
                $objPersona->setDomicilio($domicilio);
                $objPersona->insertar();
                $salida = "Persona registrada con éxito.";
            } catch (PDOException $e) {
                $salida = "Error al registrar la persona: " . $e->getMessage();
            }
        } else {
            $salida = "La persona ya está registrada.";
        }
        return $salida;
    }

    public function modificarDatosPersona($persona) {
        $salida = "";
        // Verifica si la persona existe en la base de datos
        if (!($this->obtenerDatosPersona($persona->getDni()) === null)) {
            try {
                $persona->modificar();
                $salida = "persona modificada con éxito.";
            } catch (PDOException $e) {
                $salida = "Error al modificar la persona: " . $e->getMessage();
            }
        }else{
            $salida = "La persona no existe en la base de datos.";
        }
        return $salida; 
    }

}