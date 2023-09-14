<?php

//require_once("../modelo/conector/BaseDatos.php");

class AbmPersona {
 


    public function __construct(){
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