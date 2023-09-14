<!DOCTYPE html>
<html>
<head>
    <title>Autos de Persona</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/inicio.css">
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1>Autos de Persona</h1>
    <?php
    require("../../configuracion.php");
    // Verifica si se proporcionó un DNI en la URL
    if (isset($_GET['dni'])) {
        // Obtiene el DNI de la URL
        $dniDuenio = $_GET['dni'];
        // Crea instancias de las capas de control AbmPersona y AbmAuto
        $abmPersona = new AbmPersona();
        $abmAuto = new AbmAuto();

        // Obtiene los datos de la persona
        $persona = $abmPersona->obtenerDatosPersona($dniDuenio);

        if ($persona !== null) {
            echo '<h2>Datos de la Persona</h2>';
            echo '<p>DNI: ' . $persona->getNroDni() . '</p>';
            echo '<p>Nombre: ' . $persona->getNombre() . '</p>';
            echo '<p>Apellido: ' . $persona->getApellido() . '</p>';
            echo '<p>Fecha de Nacimiento: ' . $persona->getFechaNac() . '</p>';
            echo '<p>Teléfono: ' . $persona->getTelefono() . '</p>';
            echo '<p>Domicilio: ' . $persona->getDomicilio() . '</p>';

            // Obtiene los autos de la persona
            $autos = $abmAuto->obtenerAutosPorDni($dniDuenio);

            if (!empty($autos)) {
                echo '<h2>Autos de la Persona</h2>';
                echo '<ul>';
                foreach ($autos as $auto) {
                    echo '<li>';
                    echo 'Patente: ' . $auto->getPatente() . '<br>';
                    echo 'Marca: ' . $auto->getMarca() . '<br>';
                    echo 'Modelo: ' . $auto->getModelo() . '<br>';
                    echo '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>Esta persona no tiene autos registrados.</p>';
            }
        } else {
            echo '<p>Persona no encontrada.</p>';
        }
    } else {
        echo '<p>DNI no proporcionado en la URL.</p>';
    }
    ?>
</body>
</html>