<?php
require_once("../../utils/functions.php");
require_once('../../modelo/conector/BaseDatos.php');
require_once('../../modelo/Auto.php');
require_once('../../modelo/Persona.php');
require_once('../../control/AbmAuto.php');
require_once('../../control/AbmPersona.php');

$datos = darDatosSubmitted();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $patente = $datos["patente"];
    $marca = $datos["marca"];
    $modelo = $datos["modelo"];
    $dniDuenio = $datos["dniDuenio"];

    
    $abmPersona = new AbmPersona();
    $persona = $abmPersona->obtenerDatosPersona($dniDuenio);

    if ($persona === null) {
        
        echo "La persona no está registrada. <a href='../NuevaPersona.php'>Registrar Nueva Persona</a>";
    } else {
        
        $abmAuto = new AbmAuto();
        $resultado = $abmAuto->agregarNuevoAuto($patente, $marca, $modelo, $dniDuenio);
        
        echo $resultado;
    }
}
?>