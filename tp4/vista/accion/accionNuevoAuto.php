<?php
require_once("../../utils/functions.php");
require_once('../../modelo/Auto.php');
require_once('../../modelo/Persona.php');
require_once('../../control/AbmAuto.php');
require_once('../../control/AbmPersona.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $patente = $_POST["patente"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $dniDuenio = $_POST["dniDuenio"];

    
    $abmPersona = new AbmPersona();
    $persona = $abmPersona->obtenerDatosPersona($dniDuenio);

    if ($persona === null) {
        
        echo "La persona no está registrada. <a href='NuevaPersona.php'>Registrar Nueva Persona</a>";
    } else {
        
        $abmAuto = new AbmAuto();
        $resultado = $abmAuto->agregarNuevoAuto($patente, $marca, $modelo, $dniDuenio);
        
        echo $resultado;
    }
}
?>