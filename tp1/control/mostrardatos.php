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
<?php
if($_POST){
    //Uso de heredoc para mostrar el contenido
    echo <<<CONTENIDO
    <div class="contenedor columna">
    <p class="texto_simple">Hola yo soy {$_POST["nombre"]} {$_POST["apellido"]} y tengo {$_POST["edad"]} años. Vivo en {$_POST["direccion"]}</p>
    <br>
    <button class="boton" onclick="volver()">Volver</button>
    </div>
    CONTENIDO;
    
}else if($_GET){
     //Uso de heredoc para mostrar el contenido que viene por GET
     $edad = $_GET["edad"];
     $extra = "";
     $deportes = "";
     if($edad < 18){
         $edad .= " años , soy menor de edad";
     }else{
         $edad .= " años , soy mayor de edad";
     }

     if(!empty($_GET["estudios"]) && !empty($_GET["sexo"])){
        $extra = "Mi nivel de estudios es {$_GET["estudios"]} y me identifico con el genero {$_GET["sexo"]}";
     }

     if(!empty($_GET["deportes"])){
        $deportes = "Mis deportes favoritos son: <br> ";
        foreach($_GET["deportes"] as $deporte){
            $deportes .= "- " . $deporte . " <br>";
        }
     }

     echo <<<CONTENIDO
     <div class="contenedor columna">
     <p class="texto_simple">Hola yo soy {$_GET["nombre"]} {$_GET["apellido"]} y tengo {$edad}. Vivo en {$_GET["direccion"]}
     <br>
     {$extra} 
     <br>
     {$deportes}
     </p>
     <br>
     <button class="boton" onclick="volver()">Volver</button>
     CONTENIDO;
}else{
    echo <<<CONTENIDO
    <div class="contenedor">
    <p>No se recibieron datos</p>
    </div>
    CONTENIDO;
}
?>
</body>
<script src="/tp1/vista/js/navegacion.js"></script>
<script type="text/javascript">
    const volver = () =>{
        history.back()
    }
</script>
</html>
