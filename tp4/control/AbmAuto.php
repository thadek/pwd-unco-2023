<?php



class AbmAuto
{

    public function __construct()
    {
    }


    public function obtenerTodosLosAutos()
    {
        $autos = Auto::listar();
        return $autos;
    }

    // obtiene auto segun patente
    public function obtenerDatosAuto($patente)
    {
        $autos = Auto::listar("patente = '" . $patente . "'");
        $salida = "";
        if (count($autos) > 0) {
            $salida = $autos[0];
        } else {
            $salida = null;
        }
        return $salida;
    }


    public function modificarDuenioAuto($patente, $nuevoDniDuenio)
    {
        $salida = "";
        $auto = $this->obtenerDatosAuto($patente);
        if (!($this->obtenerDatosAuto($patente) === null)) {
            try {
                $duenio = new Persona();
                $duenio->setNroDni($nuevoDniDuenio);
                $auto->setDuenio($duenio);
                $auto->modificar();
                $salida = "Dueño del auto actualizado con éxito.";
            } catch (PDOException $e) {
                $salida =  "Error al actualizar el dueño del auto: " . $e->getMessage();
            }
        } else {
            $salida = "El auto no existe en la base de datos.";
        }
        return $salida;
    }



    public function agregarNuevoAuto($patente, $marca, $modelo, $dniDuenio)
    {
        $salida = "";
        if (!($this->obtenerDatosAuto($patente) !== null)) {
            try {
                $auto = new Auto();
                $auto->setPatente($patente);
                $auto->setMarca($marca);
                $auto->setModelo($modelo);
                $duenio = new Persona();
                $duenio->setNroDni($dniDuenio);
                $auto->setDuenio($duenio);
                $auto->insertar();
                $salida = "Auto registrado con éxito.";
            } catch (PDOException $e) {
                $salida = "Error al registrar el auto: " . $e->getMessage();
            }
        } else {
            $salida = "El auto ya está registrado.";
        }
        return $salida;
    }

    public function obtenerAutosPorDni($dniDuenio)
    {
        $autos = Auto::listar("dniDuenio = '" . $dniDuenio . "'");
        $salida = "";
        if (count($autos) > 0) {
            $salida = $autos;
        } else {
            $salida = null;
        }
        return $salida;
    }


    
}
