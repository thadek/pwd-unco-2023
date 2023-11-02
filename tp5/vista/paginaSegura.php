<?php
require_once('../../configuracion.php');
require_once('../estructura/header.php');


if(Session::activa()){
    header("Location: ./login.php");
}
?>



<body class="bg-dark">
<?php
    include_once("../estructura/menu/menu.php");
    $rutalogo = "./img/";
    include_once("../estructura/Navbar.php");
?>

<div class="container cont mt-5">
  <div class="row justify-content-center">
    
      <h2>PAGINA SEGURA</h2>
      <p> <?php 

echo session_id();

      echo <<<NM
       Estas logueado como 
      NM;
      ?></p>
    </div>
  </div>
</div>



<div class="contenedor">
</div>

    <?php include_once("../estructura/Footer.php"); ?>

</body>

</html>

