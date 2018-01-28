<?php
  session_start();
  if (isset($_SESSION["usuario"])) {
    session_destroy();
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Oh, Cádiz!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon">
    <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>
    <?php
    include_once("libreria.php");
    $connection = new mysqli("localhost", "root", "Admin2015", "wikicarnaval", 3316);
    $connection->set_charset("utf8");
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }
    ?>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-sm-12 col-md-6">
          <center>
            <img class="img-sesion" src="imagenes/oh.png" alt="logo">
            <p style="color: #231F20; font-size:80px">
              <b>Oh, Cádiz!</b>
            </p>
          </center>
        </div>
        <div class="col-sm-12 col-md-6">
          <?php if ( !isset($_GET["accion"]) || $_GET["accion"]=="inicio" || $_GET["accion"]!="registro"): ?>
            <center>
              <form method="post">
                <h3>Inicia sesión</h3>
                <input style="width:50%; display: inline;" class="form-control" type='text' name='user' placeholder="Usuario" required> <br></br>
                <input style="width:50%; display: inline;" class="form-control" type='password' name='password' placeholder="Contraseña" required> <br></br>
                <input type="submit" value="Entra" class="btn btn-warning">
              <form>
            </center>
            <center>
              <hr style="width: 60%">
              <h3>¿No tienes cuenta todavia?</h3>
              <a href="sesion.php?accion=registro"><b>Regístrate aquí</b></a><br></br>
            </center>
            <?php if (isset($_POST["user"]) && isset($_POST["password"])): ?>
              <?php
              $usuario = $_POST["user"];
              $password = $_POST["password"];
              $query="SELECT * from usuario WHERE usuario='$usuario' and password=md5('$password')";
              if ($result = $connection->query($query)) {
                if ($result->num_rows==1) {
                  while ($obj = $result->fetch_object()) {
                    if ($obj->rol=="usuario") {
                      $_SESSION["usuario"]=$usuario;
                      header('Location: usuario/inicio.php');
                    } else {
                      $_SESSION["usuario"]=$usuario;
                      $_SESSION["admin"]='admin';
                      header('Location: admin/inicio.php');
                    }
                  }
                } else {
                  echo "
                  <center>
                    <p class='aviso' >Usuario o contraseña no coinciden, vuelvalo a intentar.</p>
                  </center>
                  <br></br>";
                }
              }
              ?>
            <?php endif; ?>
          <?php else: ?>
            <center>
              <form method="post">
                <h3>Resgístrate</h3>
                <input style="width:50%; display: inline;" class="form-control" type='text' name='user' placeholder="Usuario" required> <br></br>
                <input style="width:50%; display: inline;" class="form-control" type='email' name='email' placeholder="Email" required> <br></br>
                <input style="width:50%; display: inline;" class="form-control" type='password' name='password' placeholder="Contraseña" required> <br></br>
                <input type="submit" value="Registrate" class="btn btn-warning">
              <form>
            </center>
            <center>
              <hr style="width: 60%">
              <a href="sesion.php?accion=inicio"> <b>Inicia sesion aquí</b></a><br></br>
            </center>
            <?php if (isset($_POST["email"])): ?>
              <?php
              $usuario = $_POST["user"];
              $password = $_POST["password"];
              $email = $_POST["email"];
              #Comprobación de usuarios duplicados
              $query="SELECT * from usuario WHERE usuario='$usuario' or email='$email'";
              if ($result = $connection->query($query)) {
                if ($result->num_rows==1) {
                  echo "<center><p class='aviso'>Usuario o email ya existe, vuelvalo a intentar.</p></center><br></br>";
                } else {
                  #registro del usuario
                  $query2="INSERT into usuario (usuario, password, email, rol) values ('$usuario', md5('$password'), '$email', 'usuario')";
                  if ($connection->query($query2)) {
                    $_SESSION["usuario"]=$usuario;
                    header('Location: usuario/inicio.php');
                  }
                }
              }
              ?>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <script src="bootstrap/jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <?php
    copyright();
    exit();
    ?>
  </body>
</html>
