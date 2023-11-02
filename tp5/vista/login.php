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
<body class="bg-dark">

<div class="container mt-5 text-white cont">

    <div class="col-md-4 p-3">

    <?php
        if(isset($_GET['error'])){
            echo "<div class='alert alert-danger' role='alert'>
            Usuario o contraseña incorrectos
          </div>";
        }
    ?>
      <h2 class="text-center">Iniciar Sesión</h2>
      <form action="accion/verificarLogin.php" method="post">
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" class="form-control" id="usuario" name="usnombre" placeholder="Ingresa tu usuario">
        </div>
        <div class="form-group">
          <label for="contrasena">Contraseña</label>
          <input type="password" class="form-control" id="contrasena" name="uspass" placeholder="Ingresa tu contraseña">
        </div>
        <button type="submit" class="btn btn-primary mt-3 btn-block">Iniciar Sesión</button>
      </form>

  </div>
</div>

</body>

<div class="contenedor">
</div>

    <?php include_once("../estructura/Footer.php"); ?>

</body>


</html>
