<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Oh, Cádiz!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>
    <?php
    include_once("libreria.php");
    $connection = new mysqli("192.168.1.63", "root", "Admin2015", "wikicarnaval", 3316);
    $connection->set_charset("uft8");
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <center>
            <img class="img-sesion" src="imagenes/oh.png" alt="logo">
            <p style="color: #231F20; font-size:80px">
              <b>Oh, Cádiz!</b>
            </p>
          </center>
        </div>
        <div class="col-md-6">
          <?php if ( !isset($_GET["accion"]) || $_GET["accion"]=="inicio" || $_GET["accion"]!="registro"): ?>
            <center>
              <form method="post">
                <h3 id="pad" >Inicia sesión</h3>
                <span>Usuario:</span><input type='text' name='user'> <br></br>
                <span>Contraseña:</span><input type='password' name='password'> <br></br>
                <input type="submit" value="Entra" class="btn btn-warning">
              <form>
            </center>
            <center>
              <hr style="width: 60%">
              <h3 style="padding-top: 10px">¿No tienes cuenta todavia?</h3>
              <a href="sesion.php?accion=registro"><b id="pad">Regístrate aquí</b></a><br></br>
            </center>
            <?php if (isset($_POST["user"]) && isset($_POST["password"])): ?>
              <?php
              $usuario = $_POST["user"];
              $password = $_POST["password"];
              $query="SELECT * from usuario WHERE usuario='$usuario' and password='$password'";
              if ($result = $connection->query($query)) {
                if ($result->num_rows==1) {
                  header('Location: inicio.php');
                } else {
                  echo "<center><p class='aviso' >Usuario o contraseña no coinciden, vuelvalo a intentar.</p></center><br></br>";
                }
              }
              ?>
            <?php endif; ?>
          <?php else: ?>
            <center>
              <form method="post">
                <h3 id="pad" >Resgístrate</h3>
                <span>Usuario:</span><input type='text' name='user'> <br></br>
                <span>Email:</span><input type='email' name='email'> <br></br>
                <span>Contraseña:</span><input type='password' name='password'> <br></br>
                <input type="submit" value="Registrate" class="btn btn-warning">
              <form>
            </center>
            <center>
              <hr style="width: 60%">
              <h3 style="padding: 10px">¿Ya tienes cuenta?</h3>
              <a href="sesion.php?accion=inicio"> <b id="pad">Inicia sesion aquí</b></a><br></br>
            </center>
            <?php if (isset($_POST["email"])): ?>
              <?php
              $usuario = $_POST["user"];
              $password = $_POST["password"];
              $email = $_POST["email"];
              $query="SELECT * from usuario WHERE usuario='$usuario'";
              if ($result = $connection->query($query)) {
                if ($result->num_rows==1) {
                  echo "<center><p class='aviso'>Usuario ya existe, vuelvalo a intentar.</p></center><br></br>";
                } else {
                  $query2="INSERT into usuario (usuario, password, email, rol) values ('$usuario', '$password', '$email', 'usuario')";
                  if ($connection->query($query2)) {
                    header('Location: inicio.php');
                  }
                }
              }
              ?>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php
    copyright();
    unset($connection);
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
