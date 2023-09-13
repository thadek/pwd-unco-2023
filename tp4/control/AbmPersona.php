<?php

require_once('../modelo/Persona.php');

class AbmPersona {
    private $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=localhost;dbname=infoautos", "root", "");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error en la conexión a la base de datos: " . $e->getMessage());
        }
    }

     //Obtener todas las personas
     public function obtenerTodasLasPersonas() {
        $query = "SELECT * FROM persona";
        $stmt = $this->conexion->query($query);
        
        $personas = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $persona = new Persona();
            $persona->setDni($row['dni']);
            $persona->setNombre($row['nombre']);
            $persona->setApellido($row['apellido']);
            $persona->setFechaNac($row['fecha_nac']);
            $persona->setTelefono($row['telefono']);
            $persona->setDomicilio($row['domicilio']);
            $personas[] = $persona;
        }

        return $personas;
     }

   
     // Obtener persona por dni
     public function obtenerDatosPersona($dni) {
        $query = "SELECT * FROM persona WHERE nroDni = :nroDni";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nroDni', $dni);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $persona = new Persona();
            $persona->setDni($row['nroDni']);
            $persona->setNombre($row['nombre']);
            $persona->setApellido($row['apellido']);
            $persona->setFechaNac($row['fechaNac']);
            $persona->setTelefono($row['telefono']);
            $persona->setDomicilio($row['domicilio']);
            return $persona;
        } else {
            return null; 
        }
    }



    public function agregarNuevaPersona($nroDni, $nombre, $apellido, $fechaNac, $telefono, $domicilio) {

        if ($this->obtenerDatosPersona($nroDni) !== null) {
            return "La persona ya está registrada.";
        }

        
        // Si la persona no existe, realizar la inserción en la base de datos
        $query = "INSERT INTO persona (nroDni, nombre, apellido, fechaNac, telefono, domicilio) VALUES (:dni, :nombre, :apellido, :fechaNac, :telefono, :domicilio)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nroDni', $nroDni);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
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

}