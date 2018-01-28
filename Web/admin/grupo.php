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
    <?php if (!isset($_POST["buscar"]) && !isset($_GET["codAgrupacion"]) && !isset($_GET["borrar"])): ?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form action="grupo.php" method="post" enctype="multipart/form-data">
              <h3>Inserta una agrupacion</h3>
              <center>
                <table style="width:80%; margin:20px" >
                  <tr>
                    <td id="formu">Autor:</td>
                    <td>
                      <select name='codautor' class="form-control" required>
                        <?php
                        $query="SELECT * FROM autor ORDER BY nombre";
                        if ($result = $connection->query($query)) {
                          while ($obj = $result->fetch_object()) {
                            echo "
                            <option value='".$obj->codAutor."'>".$obj->nombre." ".$obj->apellidos."</option>
                            ";
                          }
                        }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td id="formu">Nombre:</td>
                    <td><input class="form-control" type='text' name='name' placeholder="Por ejemplo: La Serenissia" required></td>
                  </tr>
                  <tr>
                    <td id="formu">Tipo:</td>
                    <td>
                      <select class="form-control" name="tipo">
                        <option value="Coro">Coro</option>
                        <option value="Cuarteto">Cuarteto</option>
                        <option value="Chirigota">Chirigota</option>
                        <option value="Comparsa">Comparsa</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td id="formu">Autor de la música:</td>
                    <td><input class="form-control" type='text' name='musica' placeholder="Por ejemplo: Juan Carlos Aragón Becerra" required></td>
                  </tr>
                  <tr>
                    <td id="formu">Director:</td>
                    <td><input class="form-control" type='text' name='director' placeholder="Por ejemplo: Vicente Lázaro García" required></td>
                  </tr>
                  <tr>
                    <td id="formu">Clasificación:</td>
                    <td><input class="form-control" type='text' name='clasificacion' placeholder='Por ejemplo: Segundo premio' required></td>
                  </tr>
                  <tr>
                    <td id="formu">Localidad:</td>
                    <td><input class="form-control" type='text' name='localidad' placeholder='Por ejemplo: Cádiz' required></td>
                  </tr>
                  <tr>
                    <td id="formu">Año:</td>
                    <td><input class="form-control" type='date' name='fecha' required></td>
                  </tr>
                  <tr>
                    <td id="formu">Foto:</td>
                    <td><input class="form-control" type="file" name="image" required /></td>
                  </tr>
                </table>
                <input type="submit" name="" value="Insertar" class='btn btn-warning' required>
              </center>
            </form>
            <?php if (isset($_POST["localidad"])): ?>
              <?php
              $tmp_file = $_FILES['image']['tmp_name'];
              $target_dir = "../imagenes/grupo/";
              $target_file = strtolower($target_dir . basename($_FILES['image']['name']));
              $valid= true;
              if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $valid = false;
              }
              $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
              if ($valid) {
                move_uploaded_file($tmp_file, $target_file);
                $query1="INSERT INTO agrupacion (codagrupacion, nombre, tipo, musica, director, clasificacion, localidad, foto) VALUES('0', '".$_POST["name"]."', '".$_POST["tipo"]."', '".$_POST["musica"]."', '".$_POST["director"]."', '".$_POST["clasificacion"]."', '".$_POST["localidad"]."', '$target_file')";
                if ($result = $connection->query($query1)) {
                  $query2="SELECT * FROM agrupacion WHERE nombre='".$_POST["name"]."'";
                  if ($resulta = $connection->query($query2)) {
                    while ($obj = $resulta->fetch_object()) {
                      $query3="INSERT INTO fecha (codautor, codagrupacion, fecha) VALUES('".$_POST["codautor"]."', '".$obj->codAgrupacion."', '".$_POST["fecha"]."')";
                      if ($connection->query($query3)) {
                      }
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
              <h5 style="color: white">Así lo ve un usuario</h5>
            </center>
          </div>
          <div class="col-md-5">
            <center><img src="../imagenes/letras.jpg" alt="comparsa" class="img img-rounded">
            <form method="post">
              <h3 id="pad">Busca tu agrupacion:</h3>
              <input type='search' name='buscar' required> <br></br>
              <input type="submit" value="Buscar" class="btn btn-warning">
            </form>
            </center>
          </div>
          <div class="col-md-7">
            <center>
            <?php
            echo "<table style='width:80%; margin:20px'>";
            echo "<tr><th id='tit_tabla'> - Agrupacion - </th><tr>";
            $query="SELECT * from agrupacion order by nombre";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                echo "
                <tr>
                  <td><a href='grupo.php?codAgrupacion=".$obj->codAgrupacion."'>".$obj->nombre."</a></td>
                  <td style='width:50px'><center><a href='modificar.php?codAgrupacion=".$obj->codAgrupacion."'><img src='../imagenes/cambiar.png' alt='delete' style='width:30px'> </a> </center></td>
                  <td style='width:50px'><center><a href='grupo.php?borrar=".$obj->codAgrupacion."'><img src='../imagenes/borrar.png' alt='delete' style='width:30px'> </a> </center></td>
                </tr>";
              }
            }
            echo "</table>";
            ?>
            </center>
          </div>
        </div>
      </div>
    <?php else: ?>
      <?php if (isset($_GET["borrar"])): ?>
        <?php
        $cod = $_GET["borrar"];
        $query5="SELECT foto from agrupacion where codAgrupacion='$cod'";
        if ($result = $connection->query($query5)) {
          while ($obj = $result->fetch_object()) {
            unlink($obj->foto);
            $query4="DELETE FROM agrupacion WHERE codAgrupacion='$cod'";
            if ($connection->query($query4)) {
              header('Location: grupo.php');
            }
          }
        }
        ?>
      <?php endif; ?>

          <?php if (isset($_GET["codAgrupacion"])): ?>
            <?php
            $codigo=$_GET["codAgrupacion"];
            $query="SELECT *, year(fecha) as fecha from agrupacion a join fecha f on a.codagrupacion=f.codagrupacion where f.codAgrupacion='$codigo'";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                echo "
                <div class='container'>
                  <div class='row'>
                    <div class='col-md-6'>
                      <center>
                        <img src='".$obj->foto."' alt='' class='img img-rounded'>
                      </center>
                    </div>
                    <div class='col-md-6'>
                    <center>
                      <dl class='dl-horizontal' style='width:500px'>
                        <dt>Nombre</dt>
                        <dd>".$obj->nombre."</dd>
                        <dt>Fecha</dt>
                        <dd>".$obj->fecha."</dd>
                        <dt>Director</dt>
                        <dd>".$obj->director."</dd>
                        <dt>Música</dt>
                        <dd>".$obj->musica."</dd>
                        <dt>Clasificación</dt>
                        <dd>".$obj->clasificacion."</dd>
                      </dl>
                      <a href='letra.php?codAgrupacion=".$codigo."'><input type='button' value='Letras' class='btn btn-warning'></a> <a href='grupo.php'><input type='button' value='Volver' class='btn btn-warning'></a>
                    </center>
                    </div>
                  </div>
                </div>
                ";
              }
            }
            ?>
          <?php endif; ?>
          <?php if (isset($_POST["buscar"])): ?>
            <?php
            $buscar = $_POST["buscar"];
            $query="SELECT *, year(fecha) as fecha from agrupacion a join fecha f on a.codagrupacion=f.codagrupacion where nombre like '%".$buscar."%'";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                echo "
                <div class='container'>
                  <div class='row'>
                    <div class='col-md-6'>
                      <center>
                        <img src='".$obj->foto."' alt='' class='img img-rounded'>
                      </center>
                    </div>
                    <div class='col-md-6'>
                      <center>
                        <dl class='dl-horizontal' style='width:500px'>
                        <dt>Nombre</dt>
                        <dd>".$obj->nombre."</dd>
                        <dt>Fecha</dt>
                        <dd>".$obj->fecha."</dd>
                        <dt>Director</dt>
                        <dd>".$obj->director."</dd>
                        <dt>Música</dt>
                        <dd>".$obj->musica."</dd>
                        <dt>Clasificación</dt>
                      <dd>".$obj->clasificacion."</dd>
                      </dl>
                      <a href='letra.php?codAgrupacion=".$codigo."'><input type='button' value='Letras' class='btn btn-warning'></a> <a href='grupo.php'><input type='button' value='Volver' class='btn btn-warning'></a>
                      </center>
                    </div>
                  </div>
                </div>
                ";
              }
            }
            ?>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
    <?php
    copyright();
    script();
    exit();
    ?>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
