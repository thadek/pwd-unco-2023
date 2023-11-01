<!DOCTYPE html>
<?php
require_once('../../configuracion.php');
require_once('../estructura/header.php');
?>

<head>
    <title>Listar usuarios</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/inicio.css">
</head>

<body class="bg-dark">
    
    <main class="container-fluid cont container text-light">
        <h1>Lista de usuarios</h1>
        <?php
            // Incluye la capa de control AbmUsuario
            require_once('../modelo/conector/BaseDatos.php');
            require_once('../modelo/Usuario.php');
            require_once('../control/AbmUsuario.php');

            // Crea una instancia de la capa de control AbmUsuario
            $abmUsuario = new AbmUsuario();

            // Obtiene todos los usuarios
            $usuarios = $abmUsuario->obtenerTodosLosUsuarios();

            // Verifica si hay personas cargadas
            if (count($usuarios) > 0) {
                $salida = <<<TABLA
                <table class="table table-dark">
                <tr><th>Id</th><th>Nombre</th><th>Mail</th><th>Deshabilitado</th>
                TABLA;
                //Itera a través de la lista de personas y muestra los datos
                foreach ($usuarios as $usuario) {
                    $salida.= <<<FILA
                    <tr>
                    <td>{$usuario->getIdUsuario()}</td>
                    <td>{$usuario->getUsNombre()}</td>
                    <td>{$usuario->getUsMail()}</td>
                    <td>{$usuario->getUsDeshabilitado()}</td>
                    </tr>
                    FILA;
                }

                $salida.="</table>";

            } else {
                $salida = "<p>No hay usuarios cargados.</P>";
            }
            echo $salida;
        ?>   
    </main>
</body>
</html>
