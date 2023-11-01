<?php 

class Session {


public function __construct(){
    session_start();
}

public function iniciar($usuario,$password){
    
   
}

public function validar(){

}

public function activa(){
    return PHP_SESSION_ACTIVE === session_status();
}

public function cerrar(){
    session_destroy();
}

    

}