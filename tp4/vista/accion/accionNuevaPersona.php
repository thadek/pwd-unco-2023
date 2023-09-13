<!DOCTYPE html>
<html>
<head>
    <title>Resultado</title>
    
</head>
<body>
    <h1>Resultado Nueva Persona</h1>


    <?php
require_once("../../utils/functions.php");
require_once('../../modelo/Auto.php');
require_once('../../modelo/Persona.php');
require_once('../../control/AbmAuto.php');
require_once('../../control/AbmPersona.php');

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los valores del formulario
    $nroDni = $_POST["nroDni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaNac = $_POST["fechaNac"];
    $telefono = $_POST["telefono"];
    $domicilio = $_POST["domicilio"];

    // Realiza las validaciones necesarias, por ejemplo, si el DNI ya existe en la base de datos
    $abmPersona = new AbmPersona();
    $resultado = $abmPersona->agregarNuevaPersona($nroDni, $nombre, $apellido, $fechaNac, $telefono, $domicilio);

    if (strpos($resultado, "registrada con éxito") !== false) {
        // Éxito: la persona se registró correctamente
        echo "Persona registrada con éxito.";
    } else {
        // Error: se produjo un error durante el registro
        echo "Error al registrar la persona: " . $resultado;
    }
} else {
    // Redirigir a la página de registro si se accede directamente a este archivo sin enviar el formulario
    header("Location: NuevaPersona.php");
    exit();
}
?>

</body>
</html>