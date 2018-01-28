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
  <?php include_once("../libreria.php"); head(); ?>
  <body>
    <?php
    $connection = new mysqli("localhost", "root", "Admin2015", "wikicarnaval", 3316);
    $connection->set_charset("utf8");
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }
    menu();
    ?>
    <div class="container">
      <div class="row">
        <?php if (!isset($_GET["codAutor"]) && !isset($_GET["borrar"])): ?>
          <div class="col-md-12">
            <form action="autor.php" method="post" enctype="multipart/form-data">
              <h3>Inserta un autor</h3>
              <center>
                <table style="width:80%; margin:20px" >
                  <tr>
                    <td id="formu">Nombre: </td>
                    <td><input class="form-control" type='text' name='nombre' placeholder="Por ejemplo: Juan Carlos" required></td>
                  </tr>
                  <tr>
                    <td id="formu">Apellidos: </td>
                    <td><input class="form-control" type='text' name='apellidos' placeholder="Por ejemplo: Aragón" required></td>
                  </tr>
                  <tr>
                    <td id="formu">Apodo: </td>
                    <td><input class="form-control" type='text' name='apodo' placeholder="Por ejemplo: El Cabeza" required></td>
                  </tr>
                  <tr>
                    <td id="formu">Fecha Nacimiento: </td>
                    <td><input class="form-control" type='date' name='fechaNacimiento' required></td>
                  </tr>
                  <tr>
                    <td id="formu">Premios: </td>
                    <td><input class="form-control" type='text' name='premios' placeholder='X primeros premios, X segundos y X terceros' required></td>
                  </tr>
                  <tr>
                    <td id="formu">Biografia: </td>
                    <td><textarea class="form-control" name="biografia" rows="4" placeholder="Escribe aquí..." required></textarea></td>
                  </tr>
                  <tr>
                    <td id="formu">Foto: </td>
                    <td><input class="form-control" type="file" name="image" required /></td>
                  </tr>
                </table>
                <input type="submit" name="" value="Enviar" class='btn btn-warning' required>
              </center>
            </form>
            <?php if (isset($_POST["nombre"])): ?>
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
                move_uploaded_file($tmp_file, $target_file);
                $query="SELECT * FROM autor WHERE nombre='".$_POST["nombre"]."' and apellidos='".$_POST["apellidos"]."'";
                if ($result = $connection->query($query)) {
                  if ($result->num_rows==1) {
                    echo "El Autor está duplicado";
                  } else {
                    $query2="INSERT INTO autor VALUES(DEFAULT, '".$_POST["nombre"]."','".$_POST["apellidos"]."','".$_POST["apodo"]."','".$_POST["fechaNacimiento"]."','".$_POST["biografia"]."','".$_POST["premios"]."', '$target_file')";
                    if ($result = $connection->query($query2)) {
                    } else {
                      echo "Puede que haya puesto algún campo mal";
                    }
                  }
                }
              }

              ?>
            <?php endif; ?>
            <hr>
          </div>
          <div class="col-md-12">
            <center>
              <h5 style="color:white">Así lo ve un usuario</h5>
            </center>
          </div>
          <div class="col-md-5">
            <center><img src="../imagenes/falla.jpg" alt="falla" class="img img-rounded"></center>
          </div>
          <div class="col-md-7">
            <center>
              <table style='width:80%; margin:20px'>
                <tr>
                  <th id='tit_tabla'>- Autores del carnaval -</th>
                </tr>
                <?php
                $query="SELECT * from autor order by nombre";
                if ($result = $connection->query($query)) {
                  while ($obj = $result->fetch_object()) {
                    echo "
                    <tr>
                    <td><a href='autor.php?codAutor=".$obj->codAutor."'>".$obj->nombre." ".$obj->apellidos."</a></td>
                    <td style='width:50px'><a href='modificar.php?codautor=".$obj->codAutor."'><img src='../imagenes/cambiar.png' alt='delete' style='width:30px'> </a> </td>
                    <td style='width:50px'><a href='autor.php?borrar=".$obj->codAutor."'><img src='../imagenes/borrar.png' alt='delete' style='width:35px'> </a> </td>
                    <tr>";
                  }
                }
                ?>
              </table>
            </center>
          </div>
        <?php else: ?>
          <?php if (isset($_GET["borrar"])): ?>
            <?php
            $cod = $_GET["borrar"];
            $query5="SELECT foto from autor where codAutor='$cod'";
            if ($result = $connection->query($query5)) {
              while ($obj = $result->fetch_object()) {
                unlink($obj->foto);
                $query4="DELETE FROM autor WHERE codAutor='$cod'";
                if ($connection->query($query4)) {
                  header('Location: autor.php');
                }
              }
            }
            ?>
          <?php endif; ?>
          <div class="col-md-4">
            <?php
            $codigo=$_GET["codAutor"];
            echo "
            <table>
              <tr>
                <th id='tit_tabla'>Otros autores</th>
              </tr>";
            $query="SELECT * from autor order by nombre";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                if ($obj->codAutor!=$codigo) {
                  echo "
                  <tr>
                    <td>
                      <a href='autor.php?codAutor=".$obj->codAutor."'> - ".$obj->nombre." ".$obj->apellidos."</a>
                    </td>
                  </tr>";
                }
              }
            }
            echo "</table>";
            ?>
          </div>
          <div class="col-md-8">
            <?php
            $codigo=$_GET["codAutor"];
            $query="SELECT * from autor where codAutor='$codigo'";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                echo "
                <h3><u>".$obj->nombre." ".$obj->apellidos.": </u></h3>
                <center><img src='".$obj->foto."' alt='autor' class='img img-rounded'></center>
                <dl class='dl-horizontal' style='padding-top:20px'>
                <dt>Apodo</dt>
                <dd>".$obj->apodo."</dd>
                <dt>Premios</dt>
                <dd>".$obj->premios."</dd>
                <dt>Fecha nacimiento</dt>
                <dd>".$obj->fechaNacimiento."</dd>
                </dl>
                <p>".nl2br($obj->biografia)."</p>";
              }
            }
            ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <?php
    copyright();
    script();
    exit();
    ?>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
