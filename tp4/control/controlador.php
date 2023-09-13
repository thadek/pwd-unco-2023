<?php
require_once('Persona.php');
require_once('Auto.php');

class Controlador {
    private $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=nombre_del_servidor;dbname=nombre_de_la_base_de_datos", "nombre_de_usuario", "contraseña");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error en la conexión a la base de datos: " . $e->getMessage());
        }
    }

   
     // Obtener persona por dni
     public function obtenerDatosPersona($dni) {
        $query = "SELECT * FROM persona WHERE dni = :dni";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':dni', $dni);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $persona = new Persona();
            $persona->setDni($row['dni']);
            $persona->setNombre($row['nombre']);
            $persona->setApellido($row['apellido']);
            $persona->setFechaNac($row['fecha_nac']);
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
        $query = "INSERT INTO persona (dni, nombre, apellido, fecha_nac, telefono, domicilio) VALUES (:dni, :nombre, :apellido, :fechaNac, :telefono, :domicilio)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':dni', $nroDni);
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



    public function obtenerTodosLosAutos() {
        $query = "SELECT * FROM auto";
        $stmt = $this->conexion->query($query);

        $autos = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $auto = new Auto();
            $auto->setPatente($row['patente']);
            $auto->setMarca($row['marca']);
            $auto->setModelo($row['modelo']);
            $auto->setDniDuenio($row['dni_duenio']);
            $autos[] = $auto;
        }

        return $autos;
    }

    // obtiene auto segun patente
    public function obtenerDatosAuto($patente) {
        $query = "SELECT * FROM auto WHERE patente = :patente";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':patente', $patente);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $auto = new Auto();
            $auto->setPatente($row['patente']);
            $auto->setMarca($row['marca']);
            $auto->setModelo($row['modelo']);
            $auto->setDniDuenio($row['dni_duenio']);
            return $auto;
        } else {
            return null; 
        }
    }

    

    public function agregarNuevoAuto($patente, $marca, $modelo, $dniDuenio) {
        
        if ($this->obtenerDatosAuto($patente) !== null) {
            return "El auto ya está registrado.";
        }

        // Si el auto no existe, realizar la inserción en la base de datos
        $query = "INSERT INTO auto (patente, marca, modelo, dni_duenio) VALUES (:patente, :marca, :modelo, :dniDuenio)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':patente', $patente);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':dniDuenio', $dniDuenio);

        try {
            $stmt->execute();
            return "Auto registrado con éxito.";
        } catch (PDOException $e) {
            return "Error al registrar el auto: " . $e->getMessage();
        }
    }
}