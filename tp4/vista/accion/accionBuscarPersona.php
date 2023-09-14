<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buscar y Actualizar Persona</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Buscar y Actualizar Persona</h1>

    <?php
    require_once('../../modelo/conector/BaseDatos.php');
    require_once("../../utils/functions.php");
    require_once('../../modelo/Auto.php');
    require_once('../../modelo/Persona.php');
    require_once('../../control/AbmAuto.php');
    require_once('../../control/AbmPersona.php');

    $datos = darDatosSubmitted();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nroDni'])) {
        $nroDni = $datos['nroDni'];

       
        $abmPersona = new AbmPersona();
        
        
        $persona = $abmPersona->obtenerDatosPersona($nroDni);

        if ($persona) {
            // Muestra los datos de la persona en un formulario para su modificación
            $salida = "";
            $salida = <<<DATOS
    <h2>Datos de la Persona</h2>
    <form action="ActualizarDatosPersona.php" method="POST">
        <input type="hidden" name="nroDni" value="{$persona->getNroDni()}">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{$persona->getNombre()}" required><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="{$persona->getApellido()}" required><br>
        <label for="fechaNac">Fecha de Nacimiento:</label>
        <input type="date" id="fechaNac" name="fechaNac" value="{$persona->getFechaNac()}" required><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="{$persona->getTelefono()}"><br>
        <label for="domicilio">Domicilio:</label>
        <input type="text" id="domicilio" name="domicilio" value="{$persona->getDomicilio()}"><br>
        <input type="submit" value="Actualizar">
    </form>
DATOS;
echo $salida;
        } else {
            echo '<p>No se encontraron datos para el número de documento ingresado.</p>';
        }
    } else {
        echo '<p>Por favor, complete el formulario de búsqueda.</p>';
    }
    ?>

</body>
</html>