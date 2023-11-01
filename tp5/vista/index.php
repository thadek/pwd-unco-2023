<?php
require_once('../../configuracion.php');
require_once('../estructura/header.php');
?>

<body class="bg-dark">
<?php
    include_once("../estructura/menu/menu.php");
    $rutalogo = "./img/";
    include_once("../estructura/Navbar.php");
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 text-center">
      <h2>Bienvenido a nuestra aplicación</h2>
      <p>Por favor, selecciona una opción:</p>
      <a href="iniciarsesion.php" class="btn btn-primary">Iniciar Sesión</a>
      <a href="registrarUsuario.php" class="btn btn-secondary">Registrarse</a>
    </div>
  </div>
</div>



<div class="contenedor">
    </div>
    <?php include_once("../estructura/Footer.php"); ?>

    
</body>

