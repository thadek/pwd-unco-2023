<?php
include_once("../../control/Persona.php");
include_once("../../utils/functions.php");
$datos = darDatosSubmitted();
if($_POST){

    $persona = new Persona();

    $persona->setNombre($datos["nombre"]);
    $persona->setApellido($datos["apellido"]);
    $persona->setEdad($datos["edad"]);
    $persona->setDireccion($datos["direccion"]);

    $contenido = 
    <<<CONTENIDO
    Hola yo soy {$persona->getNombre()} {$persona->getApellido()} y tengo {$persona->getEdad()} años. Vivo en {$persona->getDireccion()}
    CONTENIDO;
    
}else if($_GET){

    $persona = new Persona();

    $persona->setNombre($datos["nombre"]);
    $persona->setApellido($datos["apellido"]);
    $persona->setEdad($datos["edad"]);
    $persona->setDireccion($datos["direccion"]);
    $persona->setEdad($datos["edad"]);
     
     $edad = $persona->getEdad();
     $extra = "";
     $deportes = "";

     if($persona->isMayorEdad()){
         $edad .= " años , soy menor de edad";
     }else{
         $edad .= " años , soy mayor de edad";
     }


     $contenido =   <<<CONTENIDO
     Hola yo soy {$persona->getNombre()} {$persona->getApellido()} y tengo {$persona->getEdad()} años. Vivo en {$persona->getDireccion()}
     CONTENIDO;

     if(!empty($datos["estudios"]) && !empty($datos["sexo"])){
        $extra = "Mi nivel de estudios es {$datos["estudios"]} y me identifico con el genero {$datos["sexo"]}";
        $contenido.= <<<CONTENIDO
        <br>
        {$extra}
        CONTENIDO;
    }

     if(!empty($datos["deportes"])){
        $deportes = $persona->setDeportes($datos["deportes"]);
        $deportes = <<<DEPORTES
        <br>
        Mis deportes favoritos son: <br> {$persona->mostrarDeportes()} 
        DEPORTES;
        $contenido.= <<<CONTENIDO
        {$deportes}
        </p>
        CONTENIDO;
       
     }
     
}else{
    
    $contenido = 
    <<<CONTENIDO
    No se recibieron datos
    CONTENIDO;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tp1/vista/css/estilos.css">
    <title>Resultado</title>
</head>
<body>
<div id="navbar"></div>

<div class="contenedor columna">
<p class="texto_simple">
<?php
echo $contenido;
?>
</p>
<br>
<button class="boton" onclick="volver()">Volver</button>
</div>


</body>
<script src="/tp1/vista/js/navegacion.js"></script>
<script type="text/javascript">
    const volver = () =>{
        history.back()
    }
</script>
</html>
