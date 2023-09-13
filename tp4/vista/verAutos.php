<!DOCTYPE html>
<html>
<head>
    <title>Ver Autos</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Agrega un archivo CSS para el estilo -->
</head>
<body>
    <h1>Lista de Autos</h1>

    <?php
    // Incluye las clases de la capa de control
    require_once('../modelo/Auto.php');
    require_once('../modelo/Persona.php');
    require_once('../control/AbmAuto.php');
    require_once('../control/AbmPersona.php');

    // Crea instancias de las clases de la capa de control
    $abmAuto = new AbmAuto();
    $abmPersona = new AbmPersona();

    // Obtén la lista de autos desde la capa de control
    $autos = $abmAuto->obtenerTodosLosAutos();

    // Verifica si hay autos cargados
    if (count($autos) > 0) {
        echo '<table>';
        echo '<tr><th>Patente</th><th>Marca</th><th>Modelo</th><th>Dueño</th></tr>';
        
        // Itera a través de la lista de autos y muestra los datos
        foreach ($autos as $auto) {
            $dueño = $abmPersona->obtenerDatosPersona($auto->getDniDuenio());
            
            echo '<tr>';
            echo '<td>' . $auto->getPatente() . '</td>';
            echo '<td>' . $auto->getMarca() . '</td>';
            echo '<td>' . $auto->getModelo() . '</td>';
            echo '<td>' . $dueño->getNombre() . ' ' . $dueño->getApellido() . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo '<p>No hay autos cargados.</p>';
    }
    ?>

</body>
</html>