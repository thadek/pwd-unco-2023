<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
    </head>
    <body class="bg-dark">
        <div class="formulario">
            <form action="accion/accionNuevoUsuario.php"  class="d-flex flex-column gap-3" style="width:60%" method="post" id="formLogin">
            <input type="text" id="nombreUsuario" name="usnombre" placeholder="Ingrese su nombre de usuario">
            <span class="error-message"></span>
            <input type="text" id="mail" name="usmail" placeholder="Ingrese su mail">
            <span class="error-message"></span>
            <input type="password" id="pass" name="uspass" placeholder="Contrase&ntilde;a">
            <span class="error-message"></span>
            <input class="btn btn-light p-3" type="submit" value="Registrar Usuario">
            </form>
        </div>
    </body>
</html>