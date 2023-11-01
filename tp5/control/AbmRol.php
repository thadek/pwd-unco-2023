<?php



class AbmRol
{

    public function __construct()
    {
    }


    public function obtenerTodosLosRoles()
    {
        $roles = Rol::listar();
        return $roles;
    }

    // obtiene rol segun idRol
    public function obtenerDatosRol($idRol)
    {
        $roles = Rol::listar("idRol = '" . $idRol . "'");
        $salida = "";
        if (count($roles) > 0) {
            $salida = $roles[0];
        } else {
            $salida = null;
        }
        return $salida;
    }


    public function modificarDatosRol($idRol, $rolDescripcion) {
        $salida = "";
    
        // Verifica si el rol existe en la base de datos
        $abmRol = new AbmRol(); 
        $rol = new Rol();
        $rol->cargar($idRol, $rolDescripcion);
    
        if (!($abmRol->obtenerDatosRol($idRol) === null)) {
            try {
                $rol->modificar();
                $salida = "Rol modificado con éxito.";
            } catch (PDOException $e) {
                $salida = "Error al modificar el rol: " . $e->getMessage();
            }
        } else {
            $salida = "El rol no existe en la base de datos.";
        }
    
        return $salida;
    }



    public function agregarNuevoRol($idRol, $rolDescripcion)
    {
        $salida = "";
        if (!($this->obtenerDatosRol($idRol) !== null)) {
            try {
                $rol = new Rol();
                $rol->setIdRol($idRol);
                $rol->setRolDescripcion($rolDescripcion);
                $rol->insertar();
                $salida = "Rol registrado con éxito.";
            } catch (PDOException $e) {
                $salida = "Error al registrar el rol: " . $e->getMessage();
            }
        } else {
            $salida = "El rol ya está registrado.";
        }
        return $salida;
    }


    
}