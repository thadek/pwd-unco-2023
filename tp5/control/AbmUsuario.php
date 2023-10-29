<?php



class AbmUsuario
{

    public function __construct()
    {
    }


    public function obtenerTodosLosUsuarios()
    {
        $usuarios = Usuario::listar();
        return $usuarios;
    }

    // obtiene usuario segun idUsuario
    public function obtenerDatosUsuario($idUsuario)
    {
        $usuarios = Usuario::listar("idUsuario = '" . $idUsuario . "' AND usDeshabilitado <> true");
        $salida = "";
        if (count($usuarios) > 0) {
            $salida = $usuarios[0];
        } else {
            $salida = null;
        }
        return $salida;
    }


    public function modificarDatosUsuario($idUsuario, $usNombre, $usPass, $usMail) {
        $salida = "";
    
        // Verifica si el usuario existe en la base de datos
        $abmUsuario = new AbmUsuario();
        $usuario = new Usuario();
        $usdeshabilitado = false;
        $usuario->cargar($idUsuario, $usNombre, $usPass, $usMail, $usdeshabilitado);
    
        if (!($abmUsuario->obtenerDatosUsuario($idUsuario) === null)) {
            try {
                $usuario->modificar();
                $salida = "Usuario modificado con éxito.";
            } catch (PDOException $e) {
                $salida = "Error al modificar el usuario: " . $e->getMessage();
            }
        } else {
            $salida = "El usuario no existe en la base de datos.";
        }
    
        return $salida;
    }



    public function agregarNuevoUsuario($idUsuario, $usNombre, $usPass, $usMail)
    {
        $salida = "";
        if (!($this->obtenerDatosUsuario($idUsuario) !== null)) {
            try {
                $usuario = new Usuario();
                $usuario->setIdUsuario($idUsuario);
                $usuario->setUsNombre($usNombre);
                $usuario->setUsPass($usPass);
                $usuario->setUsMail($usMail);
                $usuario->insertar();
                $salida = "Usuario registrado con éxito.";
            } catch (PDOException $e) {
                $salida = "Error al registrar el usuario: " . $e->getMessage();
            }
        } else {
            $salida = "El usuario ya está registrado.";
        }
        return $salida;
    }


    
}