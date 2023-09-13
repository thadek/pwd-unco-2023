<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Datos de Persona</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Actualizar Datos de Persona</h1>

    <?php
    require_once("../../utils/functions.php");
    require_once('../../modelo/Auto.php');
    require_once('../../modelo/Persona.php');
    require_once('../../control/AbmAuto.php');
    require_once('../../control/AbmPersona.php');

    $datos = darDatosSubmitted();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nroDni'])) {
        $nroDni = $datos['nroDni'];
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $fechaNac = $datos['fechaNac'];
        $telefono = $datos['telefono'];
        $domicilio = $datos['domicilio'];

        
        $abmPersona = new AbmPersona();

        // Modifica los datos de la persona en la base de datos
        $resultado = $abmPersona->modificarDatosPersona($nroDni, $nombre, $apellido, $fechaNac, $telefono, $domicilio);

        if ($resultado === "Persona actualizada con éxito.") {
            echo '<p>Los datos de la persona se actualizaron con éxito.</p>';
        } else {
            echo '<p>Ocurrió un error al actualizar los datos de la persona: ' . $resultado . '</p>';
        }
    } else {
        echo '<p>No se han proporcionado datos válidos para actualizar.</p>';
    }
    ?>

</body>
</html>