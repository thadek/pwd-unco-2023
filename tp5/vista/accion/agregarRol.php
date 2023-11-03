<?php
 require_once("../../../configuracion.php"); 
 require_once('../../modelo/conector/BaseDatos.php');
 require_once('../../modelo/Usuario.php');
 require_once('../../control/AbmUsuario.php'); 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $descripcionRol = htmlspecialchars(trim($_POST['roldescripcion']));
    

    if ( empty($descripcionRol)) {
        echo "Por favor, complete todos los campos.";
        exit();
    }

    $rol= new AbmRol();

   
    $resultado = $rol->agregarNuevoRol($descripcionRol);
    
    if ($resultado === "Rol registrado con éxito.") {
        
       echo "el rol se agrego correctamente";
        exit();
    } elseif ($resultado === "El rol ya está registrado.") {
    
        echo "El rol ya está registrado.";
    }else {
        
        echo "Error al agregar el rol: " . $resultado;
    }
} else {
   
    echo "Acceso no válido.";
}
?>