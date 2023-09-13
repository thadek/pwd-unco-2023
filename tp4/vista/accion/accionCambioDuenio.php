<?php
require_once("../../utils/functions.php");
require_once('../../modelo/Auto.php');
require_once('../../modelo/Persona.php');
require_once('../../control/AbmAuto.php');
require_once('../../control/AbmPersona.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patente = $_POST['patente'];
    $dni = $_POST['nroDni'];

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