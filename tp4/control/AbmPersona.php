<?php

//require_once("../modelo/conector/BaseDatos.php");

class AbmPersona {
 


    public function __construct() {
    }

     //Obtener todas las personas
     public function obtenerTodasLasPersonas() {
        $personas = Persona::listar();
        return $personas;
     }

   
     // Obtener persona por dni
     public function obtenerDatosPersona($dni) {
        $personas = Persona::listar("nroDni = '" . $dni . "'");
        $salida = "";
        if (count($personas) > 0) {
            $salida = $personas[0];
        } else {
            $salida = null;
        }
        return $salida;
    }



    public function agregarNuevaPersona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio) {

        if ($this->obtenerDatosPersona($nroDni) !== null) {
            return "La persona ya está registrada.";
        }

        
        // Si la persona no existe, realizar la inserción en la base de datos
        $query = "INSERT INTO persona (nroDni, apellido, nombre, fechaNac, telefono, domicilio) 
        VALUES (:nroDni, :apellido, :nombre, :fechaNac, :telefono, :domicilio)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nroDni', $nroDni);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fechaNac', $fechaNac);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':domicilio', $domicilio);

        try {
            $stmt->execute();
            return "Persona registrada con éxito.";
        } catch (PDOException $e) {
            return "Error al registrar la persona: " . $e->getMessage();
        }
    }

    public function modificarDatosPersona($nroDni, $nombre, $apellido, $fechaNac, $telefono, $domicilio) {
        
        if ($this->obtenerDatosPersona($nroDni) === null) {
            return "La persona no existe en la base de datos.";
        }
    
        // Actualiza los datos de la persona en la base de datos
        $query = "UPDATE persona 
                  SET nombre = :nombre, 
                      apellido = :apellido, 
                      fechaNac = :fechaNac, 
                      telefono = :telefono, 
                      domicilio = :domicilio 
                  WHERE nroDni = :nroDni";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nroDni', $nroDni);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':fechaNac', $fechaNac);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':domicilio', $domicilio);
    
        try {
            $stmt->execute();
            return "Persona actualizada con éxito.";
        } catch (PDOException $e) {
            return "Error al actualizar los datos de la persona: " . $e->getMessage();
        }
    }

}