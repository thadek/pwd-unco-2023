<?php
 require_once("../../../configuracion.php");
$datos = darDatosSubmitted();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patente = $datos['patente'];
    $dni = $datos['nroDni'];

    $abmAuto = new AbmAuto();
    $abmPersona = new AbmPersona();

    // Verificar si el auto y la persona existen en la base de datos
    $autoExistente = $abmAuto->obtenerDatosAuto($patente);
    $personaExistente = $abmPersona->obtenerDatosPersona($dni);

    if ($autoExistente && $personaExistente) {
        // Realizar el cambio de dueño del auto
        $resultado = $abmAuto->modificarDuenioAuto($patente, $dni);

        if (strpos($resultado, 'con éxito') !== false) {
            echo "Cambio de dueño realizado con éxito.";
        } else {
            echo "Error: $resultado";
        }
    } else {
        echo "El auto o la persona no existen en la base de datos.";
    }
}
?>