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
 

 require_once("../../../configuracion.php");

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
         echo $resultado;
    } else {
        echo '<p>No se han proporcionado datos válidos para actualizar.</p>';
    }
    ?>

</body>
</html>