<?php
  session_start();
  if (null!==$_SESSION["usuario"] && null!==$_SESSION["admin"]) {
  } else {
    session_destroy();
    header("Location: ../sesion.php");
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Oh, Cádiz!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../imagenes/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../imagenes/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../estilo.css">
  </head>
  <body>
    <?php
    $connection = new mysqli("localhost", "root", "Admin2015", "wikicarnaval", 3316);
    $connection->set_charset("utf8");
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }
    ?>
    <?php
    include_once("libreria.php");
    menu();
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php if (isset($_GET["codautor"]) || isset($_GET["codAgrupacion"])): ?>
            <?php if (isset($_GET["codautor"])): ?>
              <?php
              $query="SELECT * FROM autor WHERE codAutor='".$_GET["codautor"]."'";
              if ($result = $connection->query($query)) {
                while ($obj = $result->fetch_object()) {
                  $cod = $obj->codAutor;
                  echo "
                  <form action='modificar.php' method='post' enctype='multipart/form-data'>
                    <h3 id='pad'>Modifica el autor ".$obj->nombre." ".$obj->apellidos."</h3>
                    <center><img src='".$obj->foto."' alt='autor' class='img img-rounded' style='width:30%'></center>
                    <center>
                      <table>
                        <tr>
                          <td>Nombre: </td>
                          <td><input class='form-control' type='text' name='nombre' value='".$obj->nombre."' required></td>
                        </tr>
                        <tr>
                          <td>Apellidos: </td>
                          <td><input class='form-control' type='text' name='apellidos' value='".$obj->apellidos."' required></td>
                        </tr>
                        <tr>
                          <td>Apodo: </td>
                          <td><input class='form-control' type='text' name='apodo' value='".$obj->apodo."' required></td>
                        </tr>
                        <tr>
                          <td style='width:200px'>Fecha Nacimiento: </td>
                          <td><input class='form-control' type='date' name='fechaNacimiento' value='".$obj->fechaNacimiento."' required></td>
                        </tr>
                        <tr>
                          <td>Premios: </td>
                          <td><input class='form-control' type='text' name='premios' value='".$obj->premios."' required></td>
                        </tr>
                        <tr>
                          <td>Biografia: </td>
                          <td><textarea class='form-control' name='biografia' rows='4' required>".$obj->biografia."</textarea></td>
                        </tr>
                        <tr>
                          <td>Foto: </td>
                          <td><input class='form-control' type='file' name='image' /></td>
                        </tr>
                        <tr>
                          <td colspan='2' style='padding-top:20px'><center><input type='submit' name='' value='Enviar' class='btn btn-warning' required></center></td>
                        </tr>
                        <tr>
                          <td><input type='hidden' name='codAutor' value='".$obj->codAutor."' required></td>
                          <td><input type='hidden' name='foto' value='".$obj->foto."' required></td>
                        </tr>
                      </table>
                    </center>
                  </form>
                  ";
                }
              }
              ?>

            <?php endif; ?>
            <?php if (isset($_GET["codagrupacion"])): ?>
              <!-- Codigo update Agrupacion -->

            <?php endif; ?>
          <?php else: ?>
            <!-- Si quieres hacer un update modificando la foto -->
            <?php if (isset($_POST["image"])): ?>
              <?php
              $tmp_file = $_FILES['image']['tmp_name'];
              $target_dir = "../imagenes/autores/";
              $target_file = strtolower($target_dir . basename($_FILES['image']['name']));
              $valid= true;
              if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $valid = false;
              }
              $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
              if ($valid) {
                var_dump($target_file);
                move_uploaded_file($tmp_file, $target_file);
                $query2="UPDATE autor set nombre='".$_POST['nombre']."', apellidos='".$_POST['apellidos']."', apodo='".$_POST['apodo']."', fechaNacimiento='".$_POST['fechaNacimiento']."', biografia='".$_POST['biografia']."', premios='".$_POST['premios']."', foto='$target_file' WHERE codAutor='".$_POST['codAutor']."'";
                if ($result = $connection->query($query2)) {
                  header('Location: autor.php');
                } else {
                  echo "Puede que haya puesto algun campo mal";
                }
              }
              ?>
            <?php endif; ?>

            <!-- Si quieres hacer un update pero sin modificar la foto -->
            <?php if (!isset($_POST["image"]) && isset($_POST["nombre"])): ?>
              <?php
              $query2="UPDATE autor set nombre='".$_POST['nombre']."', apellidos='".$_POST['apellidos']."', apodo='".$_POST['apodo']."', fechaNacimiento='".$_POST['fechaNacimiento']."', biografia='".$_POST['biografia']."', premios='".$_POST['premios']."', foto='".$_POST['foto']."' WHERE codAutor='".$_POST['codAutor']."'";
              if ($result = $connection->query($query2)) {
                header('Location: autor.php');
              } else {
                echo "Puede que haya puesto algun campo mal";
              }
              ?>
            <?php endif; ?>

            <!-- Si quieres hacer un update de codAgrupacion V V V V AQUI ABAJO V V V V -->

          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php
    copyright();
    exit();
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
