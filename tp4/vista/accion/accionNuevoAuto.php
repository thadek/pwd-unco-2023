<?php
 require_once("../../../configuracion.php");

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