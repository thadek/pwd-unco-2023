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
    public static function obtenerDatosUsuario($idUsuario)
    {
        $usuarios = Usuario::listar("idUsuario = '" . $idUsuario . "' AND usdeshabilitado <> true");
        $salida = "";
        if (count($usuarios) > 0) {
            $salida = $usuarios[0];
        } else {
            $salida = null;
        }
        return $salida;
    }

    // obtiene usuario segun usNombre
    public static function obtenerUsuarioPorNombre($usNombre){
        $salida = "";
        $user = Usuario::listar("usnombre = '" . $usNombre . "'");
        if (count($user) > 0) {
            $salida = $user[0];
        } else {
            $salida = -1;
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



    public function agregarNuevoUsuario($usNombre, $usPass, $usMail)
    {
        $salida = "";
        if (!(AbmUsuario::obtenerUsuarioPorNombre($usNombre) !== null)) {
            try {
                $usuario = new Usuario();
                $usuario->setUsNombre($usNombre);
                //Encripto la password?
                
                $usuario->setUsPass($usPass);
                $usuario->setUsMail($usMail);

                $usuario->insertar();
                $rolUsuario = new UsuarioRol();
                $rolUsuario->setIdUsuario($usuario->getIdUsuario());
                $rolUsuario->setIdRol(2);
                $rolUsuario->insertar();
                $salida = "Usuario registrado con éxito.";
            } catch (PDOException $e) {
                $salida = "Error al registrar el usuario: " . $e->getMessage();
            }
        } else {
            $salida = "El usuario ya está registrado.";
        }
        return $salida;
    }


   public static function validarLogin($usuario, $password){
        $salida = false;
        $usuario = AbmUsuario::obtenerUsuarioPorNombre($usuario);
        if ($usuario !== -1) {
            if($password == $usuario->getUsPass()){
                $salida = true;
            }
        }
        return $salida;
    }



    public static function obtenerRol($idUsuario){
        $salida = "";
        $abmUsuarioRol = new AbmUsuarioRol();
        $usuarioRol = $abmUsuarioRol->obtenerDatosUsuarioRol($idUsuario);
        if ($usuarioRol !== null) {
            $salida = $usuarioRol->getIdRol();
        }
        return $salida;
    }


    public static function obtenerNombreRol($idRol){
        $salida = "";
        $abmRol = new AbmRol();
        $rol = $abmRol->obtenerDatosRol($idRol);
        if ($rol !== null) {
            $salida = $rol->getRolDescripcion();
        }
        return $salida;
    }

  
   




    
}