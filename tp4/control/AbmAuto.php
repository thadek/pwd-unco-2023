<?php

class AbmAuto {
    private $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=127.0.0.1;port=3306;dbname=infoautos", "root", getenv("SQL_PASSWORD") || "");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error en la conexión a la base de datos: " . $e->getMessage());
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
                $auto->setDniDuenio($row['dniDuenio']);
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
                $auto->setDniDuenio($row['dniDuenio']);
                return $auto;
            } else {
                return null; 
            }
        }

        public function modificarDuenioAuto($patente, $nuevoDniDuenio) {
            
            if ($this->obtenerDatosAuto($patente) === null) {
                return "El auto no existe en la base de datos.";
            }
        
            
            $query = "UPDATE auto SET dniDuenio = :nuevoDniDuenio WHERE patente = :patente";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':nuevoDniDuenio', $nuevoDniDuenio);
            $stmt->bindParam(':patente', $patente);
        
            try {
                $stmt->execute();
                return "Dueño del auto actualizado con éxito.";
            } catch (PDOException $e) {
                return "Error al actualizar el dueño del auto: " . $e->getMessage();
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

        public function obtenerAutosPorDni($dniDuenio) {
            $query = "SELECT * FROM autos WHERE dniDuenio = :dniDuenio";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':dniDuenio', $dniDuenio);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $auto = new Auto();
                $auto->setPatente($row['patente']);
                $auto->setMarca($row['marca']);
                $auto->setModelo($row['modelo']);
                $auto->setDniDuenio($row['dniDuenio']);
                $autos[] = $auto;
            }

            return $auto;
        }
        public function modificarAuto($auto) {
            // Verifica si el auto existe en la base de datos
            if ($this->obtenerDatosAuto($auto->getPatente()) === null) {
                return "El auto no existe en la base de datos.";
            }
        
            // Actualiza los datos del auto en la base de datos
            $query = "UPDATE auto SET marca = :marca, modelo = :modelo, dniDuenio = :dniDuenio WHERE patente = :patente";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':marca', $auto->getMarca());
            $stmt->bindParam(':modelo', $auto->getModelo());
            $stmt->bindParam(':dniDuenio', $auto->getDniDuenio());
            $stmt->bindParam(':patente', $auto->getPatente());
        
            try {
                $stmt->execute();
                return "Auto modificado con éxito.";
            } catch (PDOException $e) {
                return "Error al modificar el auto: " . $e->getMessage();
            }
        }
}