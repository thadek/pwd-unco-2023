<?php


class AbmUsuarioRol
{

    public function __construct()
    {
    }

    public function obtenerTodosLosUsuarioRol()
    {
        $usuarioRol = UsuarioRol::listar();
        return $usuarioRol;
    }

    public function obtenerDatosUsuarioRol($idUsuarioRol)
    {
        $usuarioRol = UsuarioRol::listar("idUsuarioRol = '" . $idUsuarioRol . "'");
        $salida = "";
        if (count($usuarioRol) > 0) {
            $salida = $usuarioRol[0];
        } else {
            $salida = null;
        }
        return $salida;
    }

    public function agregarUsuarioRol($idUsuario, $idRol)
    {
        $salida = "";
        if (!($this->obtenerDatosUsuarioRol($idUsuario) !== null)) {
            try {
                $usuarioRol = new UsuarioRol();
                $usuarioRol->setIdUsuario($idUsuario);
                $usuarioRol->setIdRol($idRol);
                $usuarioRol->insertar();
                $salida = "UsuarioRol agregado con éxito.";
            } catch (PDOException $e) {
                $salida =  "Error al agregar el usuarioRol: " . $e->getMessage();
            }
        } else {
            $salida = "El usuarioRol ya existe en la base de datos.";
        }
        return $salida;
    }

    public function eliminarUsuarioRol($idUsuario)
    {
        $salida = "";
        if (!($this->obtenerDatosUsuarioRol($idUsuario) === null)) {
            try {
                $usuarioRol = new UsuarioRol();
                $usuarioRol->setIdUsuario($idUsuario);
                $usuarioRol->eliminar();
                $salida = "UsuarioRol eliminado con éxito.";
            } catch (PDOException $e) {
                $salida =  "Error al eliminar el usuarioRol: " . $e->getMessage();
            }
        } else {
            $salida = "El usuarioRol no existe en la base de datos.";
        }
        return $salida;
    }

    public function modificarUsarioRol($idUsuario, $idRol){

    }
}