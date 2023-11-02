<?php 

class Session {


public function __construct(){
    session_start();
}

public function iniciar($usuario,$password){
    $_SESSION['usuario'] = $usuario;
    $_SESSION['password'] = $password;   
}

public function validar(){
    $salida = false;
    if (isset($_SESSION['usuario']) && isset($_SESSION['password'])){
      
       if(AbmUsuario::validarLogin($_SESSION['usuario'],$_SESSION['password'])){
              $salida = true;
       };     
    } 
    return $salida;
}

public static function activa(){
    return PHP_SESSION_ACTIVE === session_status();
}

public function cerrar(){
    session_destroy();
}

    

}