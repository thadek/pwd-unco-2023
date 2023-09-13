<!DOCTYPE html>
<html>
<head>
    <title>Lista de Personas</title>
</head>
<body>
    <h1>Lista de Personas</h1>
    <?php
    // Incluye la capa de control AbmPersona
    require_once('../control/AbmPersona.php');

    // Crea una instancia de la capa de control AbmPersona
    $abmPersona = new AbmPersona();

    // Obtiene todas las personas
    $personas = $abmPersona->obtenerTodasLasPersonas();

    // Verifica si hay personas cargadas
    if (count($personas) > 0) {
        echo '<table>';
        echo '<tr><th>Dni</th><th>Nombre</th><th>Apellido</th><th>Fecha Nac</th><th>Telefono</th><th>Domicilio</th></tr>';
        
        // Itera a través de la lista de personas y muestra los datos
        foreach ($personas as $personas) {
            echo '<tr>';
            echo '<td>' . '<a href="autosPersona.php?dni=' . $personas->getNroDni(). '">' . $persona->getNroDni() . '</a></td>';
            echo '<td>' . $personas->getNombre() . '</td>';
            echo '<td>' . $personas->getApellido() . '</td>';
            echo '<td>' . $personas->getFechaNac() .'</td>';
            echo '<td>' . $personas->getTelefono() .'</td>';
            echo '<td>' . $personas->getDomicilio() .'</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo '<p>No hay personas cargadas.</p>';
    }
    echo '</ul>';
    ?>
</body>
</html>