<!DOCTYPE html>
<html>
<head>
    <title>Resultado</title>
    
</head>
<body>
    <h1>Resultado Nueva Persona</h1>


    <?php
 require_once("../../../configuracion.php");

$datos = darDatosSubmitted();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nroDni = $datos["nroDni"];
    $nombre = $datos["nombre"];
    $apellido = $datos["apellido"];
    $fechaNac = $datos["fechaNac"];

    $fechaSql = date('Y-m-d', strtotime(str_replace('/', '-', $fechaNac)));

    $telefono = $datos["telefono"];
    $domicilio = $datos["domicilio"];

    // Realiza las validaciones necesarias, por ejemplo, si el DNI ya existe en la base de datos
    $abmPersona = new AbmPersona();
    $resultado = $abmPersona->agregarNuevaPersona($nroDni, $nombre, $apellido, $fechaSql, $telefono, $domicilio);

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