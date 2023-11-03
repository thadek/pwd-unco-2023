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

    $rolModel = new AbmRol();

   
    $stmt = $pdo->prepare("INSERT INTO roles (nombre, descripcion) VALUES (:nombre, :descripcion)");
    $stmt->bindParam(':nombre', $nombreRol);
    $stmt->bindParam(':descripcion', $descripcionRol);

    
    if ($stmt->execute()) {
        
       echo "el rol se agrego correctamente";
        exit();
    } else {
        
        echo "Error al agregar el rol. Por favor, inténtalo de nuevo.";
    }
} else {
   
    echo "Acceso no válido.";
}
?>