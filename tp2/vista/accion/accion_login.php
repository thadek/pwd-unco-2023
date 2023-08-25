<?php

$usuario1 = ["username" => "Fran0154", "password" => "limonsalado96"];
$usuario2 = ["username" => "Pepito420", "password" => "minecraft77"];
$usuario3 = ["username" => "lolaso123", "password" => "argentoP1"];
$usuario4 = ["username" => "dukoscu76", "password" => "fristail93"];
$usuario5 = ["username" => "juanPeralez", "password" => "contraseña1"];

$usuarios[0] = $usuario1;
$usuarios[1] = $usuario2;
$usuarios[2] = $usuario3;
$usuarios[3] = $usuario4;
$usuarios[4] = $usuario5;

if ($_POST){

    $username = $_POST['username_form'];
    $password = $_POST['password_form'];
    $resp = false;
    $cantUsuarios = count($usuarios);
    $i = 0;

    while ($i < $cantUsuarios && !$resp){
        $unUsuario = $usuarios[$i];
        $unUsername = $unUsuario["username"];
        $unPassword = $unUsuario["password"];

        if ($username == $unUsername && $password == $unPassword){
            $resp = true;
        }

        $i++;
    }
    
    if ($resp){
        $contenido =  '<body class="greenBody">
        <div class="container col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-4" >
            <div class="form-control mt-4">
                <h1>Login successful!</h1>
            </div>
        </div>
        </body>';
    } else {
        $contenido = '<body class="redBody">
        <div class="container col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-4" >
            <div class="form-control mt-4">
                <h1>Login error</h1>
            </div>
        </div>
        </body>';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/tp2/vista/css/ej3.css">
    </head>
    <body>
        <?php echo $contenido; ?>
    </body>
</html>