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
    <style media="screen">
    html, body {
      height:100%;
    }
    body {
      display:flex;
      align-items:center;
      margin: auto;
      background: url(imagenes/falla.jpg);
      background-repeat:no-repeat;
	    background-position:center center;
	    background-attachment:fixed;
	    -o-background-size: 100% 100%, auto;
	    -moz-background-size: 100% 100%, auto;
      -webkit-background-size: 100% 100%, auto;
      background-size: 100% 100%, auto;
    }
    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }
    .form-signin .form-control {
      position: relative;
      height: auto;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      padding: 10px;
      font-size: 16px;
    }
    .fondo {
      background: rgba(192, 192, 192, 0.6);
      padding: 15px;
      margin: 0 auto;
    }
    .btn, .btn-warning {
      color: #F9F9F9;
      background-color: rgba(150, 35, 35, 1);
      border-color: rgba(79, 3, 0, 0.5);
    }
    .btn:hover , .btn-warning:hover {
      color: #F9F9F9;
      background-color: rgba(193, 42, 42, 1);;
      border-color: rgba(193, 42, 42, 0.5);
    }

    </style>
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
    <?php if ( !isset($_GET["accion"]) || $_GET["accion"]=="inicio" || $_GET["accion"]!="registro"): ?>
      <div class="fondo col-md-5">
        <form class="form-signin" method="post">
          <center><img class="mb-4" src="imagenes/oh.png" alt="" width="150">
            <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1></center>
            <label class="sr-only">Usuario</label>
            <input name="user" type="text" class="form-control" placeholder="Usuario" style="margin-top:10px" required autofocus>
            <label class="sr-only">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Contraseña" style="margin-top:10px" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:20px">Entrar</button>
          </form>
          <center>
            <hr style="width: 60%">
            <h3>¿No tienes cuenta todavía?</h3>
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
                    $_SESSION["foto"]=$obj->foto;
                    $_SESSION["usuario"]=$usuario;
                    header('Location: usuario/inicio.php');
                  } else {
                    $_SESSION["foto"]=$obj->foto;
                    $_SESSION["usuario"]=$usuario;
                    $_SESSION["admin"]='admin';
                    header('Location: admin/inicio.php');
                  }
                }
              } else {
                echo "
                <center>
                  <p class='aviso'>Usuario o contraseña no coinciden, vuelvalo a intentar.</p>
                  </center>
                <br></br>";
              }
            }
          ?>
        </div>
      <?php endif; ?>
    <?php else: ?>
      <div class="fondo col-md-5">
        <form class="form-signin" method="post">
          <center><img class="mb-4" src="imagenes/oh.png" alt="" width="150">
            <h1 class="h3 mb-3 font-weight-normal">Registrarte</h1></center>
            <label class="sr-only">Usuario</label>
            <input name="user" type="text" class="form-control" placeholder="Usuario" style="margin-top:10px" required autofocus>
            <label class="sr-only">Email address</label>
            <input name="email" type="email" class="form-control" placeholder="Email" style="margin-top:10px" required>
            <label class="sr-only">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Contraseña" style="margin-top:10px" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:20px">Registrar</button>
          </form>
          <center>
            <hr style="width: 60%">
            <h3>¿Ya tienes cuenta?</h3>
            <a href="sesion.php?accion=inicio"> <b>Inicia sesión aquí</b></a><br></br>
          </center>
          <?php if (isset($_POST["email"])): ?>
          <?php
            $usuario = $_POST["user"];
            $password = $_POST["password"];
            $email = $_POST["email"];

            $query="SELECT * from usuario WHERE usuario='$usuario' or email='$email'";
            if ($result = $connection->query($query)) {
              if ($result->num_rows==1) {
                echo "<center><p class='aviso'>Usuario o email ya existe, vuelvalo a intentar.</p></center><br></br>";
              } else {
                #registro del usuario
                $query2="INSERT into usuario (usuario, password, email, rol, foto)
                values ('$usuario', md5('$password'), '$email', 'usuario', '../imagenes/perfil/usuario.png')";
                if ($connection->query($query2)) {
                  $_SESSION["foto"]="../imagenes/perfil/usuario.png";
                  $_SESSION["usuario"]=$usuario;
                  header('Location: usuario/inicio.php');
                }
              }
            }
          ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <script src='bootstrap/jquery/jquery-3.1.1.slim.min.js' integrity='sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n' crossorigin='anonymous'></script>
    <script src='bootstrap/js/bootstrap.min.js' integrity='sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn' crossorigin='anonymous'></script>
  </body>
</html>
