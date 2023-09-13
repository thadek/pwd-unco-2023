<!DOCTYPE html>
<html>
<head>
    <title>Resultado de la Búsqueda</title>
    
</head>
<body>
    <h1>Resultado de la Búsqueda</h1>

    <?php
    require_once('AbmAuto.php');
    require_once('AbmPersona.php');

    
    if (isset($_POST['patente'])) {
        $patente = $_POST['patente'];

        
        $abmAuto = new AbmAuto();
        $abmPersona = new AbmPersona();

        
        $auto = $abmAuto->obtenerDatosAuto($patente);

        
        if ($auto !== null) {
            $dueño = $abmPersona->obtenerDatosPersona($auto->getDniDuenio());
            echo '<table>';
            echo '<tr><th>Patente</th><th>Marca</th><th>Modelo</th><th>Dueño</th></tr>';
            echo '<tr>';
            echo '<td>' . $auto->getPatente() . '</td>';
            echo '<td>' . $auto->getMarca() . '</td>';
            echo '<td>' . $auto->getModelo() . '</td>';
            echo '<td>' . $dueño->getNombre() . ' ' . $dueño->getApellido() . '</td>';
            echo '</tr>';
            echo '</table>';
        } else {
            echo '<p>No se encontró ningún auto con la patente ingresada.</p>';
        }
    } else {
        echo '<p>No se proporcionó una patente válida.</p>';
    }
    ?>

</body>
</html>