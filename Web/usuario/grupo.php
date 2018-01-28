<?php
  session_start();
  if (isset($_SESSION["usuario"])) {
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
    <?php if (!isset($_GET["codAgrupacion"]) && !isset($_POST["nombre"])): ?>
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <center><img src="../imagenes/letras.jpg" alt="comparsa" class="img img-rounded">
            <form method="post">
              <h3>Busca tu agrupacion:</h3>
              <input type='search' name='nombre' required> <br></br>
              <input type="submit" value="Buscar" class="btn btn-warning">
            </form>
            </center>
          </div>
          <div class="col-md-7">
            <center>
            <?php
            echo "<table >";
            echo "<tr><th id='tit_tabla'> - Agrupacion - </th><th id='tit_tabla'> - Tipo - </th><tr>";
            $query="SELECT * from agrupacion order by nombre";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                echo "
                <tr>
                  <td style='width: 300px;'><a href='grupo.php?codAgrupacion=".$obj->codAgrupacion."'>".$obj->nombre."</a></td>
                  <td>".$obj->tipo."</td></a>
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
      <div class="container">
        <div class="row">
          <?php if (isset($_GET["codAgrupacion"]) && !isset($_POST["nombre"])): ?>
            <?php
            $codigo=$_GET["codAgrupacion"];
            $query="SELECT *, year(fecha) as fecha from agrupacion a join fecha f on a.codagrupacion=f.codagrupacion where f.codAgrupacion='$codigo'";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                echo "
                <div class='col-md-6'>
                  <center>
                    <img src='".$obj->foto."' alt='' class='img img-rounded'>
                  </center>
                </div>
                <div class='col-md-6'>
                <center>
                  <dl class='dl-horizontal' style='width:400px'>
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
                  <a href='letra.php?codAgrupacion=".$codigo."'><input type='button' value='Letras' class='btn btn-warning'></a> <a href='grupo.php'><input type='button' value='Volver' class='btn btn-warning'></a></center>
                </div>
                ";
              }
            }
            ?>
          <?php else: ?>
            <?php
            $nombre=$_POST["nombre"];
            $query="SELECT *, year(fecha) as fecha from agrupacion a join fecha f on a.codagrupacion=f.codagrupacion where nombre like '%".$nombre."%'";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                $codigo=$obj->codAgrupacion;
                echo "
                <div class='container'>
                  <div class='row'>
                  <div class='col-md-6'>
                    <center>
                      <img src='".$obj->foto."' alt='' class='img img-rounded'>
                    </center>
                  </div>
                  <div class='col-md-6'>
                    <dl class='dl-horizontal'>
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
                    <center><a href='letra.php?codAgrupacion=".$codigo."'><input type='button' value='Letras' class='btn btn-warning'></a> <a href='grupo.php'><input type='button' value='Volver' class='btn btn-warning'></a></center>
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
  </body>
</html>
