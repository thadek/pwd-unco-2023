
<!DOCTYPE html>
<html>
<head>
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <style>
    h2, p {
      color: white;
    }
  </style>
</head>
<body class="bg-dark">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <h2 class="text-center">Iniciar Sesión</h2>
      <form>
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" class="form-control" id="usuario" placeholder="Ingresa tu usuario">
        </div>
        <div class="form-group">
          <label for="contrasena">Contraseña</label>
          <input type="password" class="form-control" id="contrasena" placeholder="Ingresa tu contraseña">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>
