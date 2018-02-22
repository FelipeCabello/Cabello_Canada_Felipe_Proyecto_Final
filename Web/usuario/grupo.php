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
    $connection = basedatos();
    ?>
    <?php if (!isset($_GET["codAgrupacion"]) && !isset($_POST["nombre"])): ?>
      <div class="container" >
        <?php menu(); ?>
        <div class="row">
          <div class="col-md-5" style="margin-top:100px">
            <center><img src="../imagenes/letras.jpg" alt="comparsa" class="img rounded">
            <form method="post">
              <h3>Busca tu agrupación:</h3>
              <input type='search' name='nombre' class="form-control" required style="width:50%"> <br></br>
              <input type="submit" value="Buscar" class="btn btn-warning">
            </form>
            </center>
          </div>
          <div class="col-md-7">
            <center>
            <?php
            echo "<table >";
            echo "<tr><th id='tit_tabla'> - Agrupación - </th><th id='tit_tabla'> - Tipo - </th><tr>";
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
      <?php if (isset($_GET["codAgrupacion"]) && !isset($_POST["nombre"])): ?>
        <?php
        $codigo=$_GET["codAgrupacion"];
        $query="SELECT *, year(fecha) as fecha from agrupacion a join fecha f on a.codagrupacion=f.codagrupacion where f.codAgrupacion='$codigo'";
        if ($result = $connection->query($query)) {
          echo "<div class='container'>";
          menu();
          while ($obj = $result->fetch_object()) {
            echo "
            <div class='row align-items-center'>
              <div class='col-md-6'>
                <center>
                  <img src='".$obj->foto."' alt='' class='img rounded'>
                </center>
              </div>
              <div class='col-md-6'>
              <center>
              <table>
                <tr>
                  <td id='tabla'><b>Nombre</b></td>
                  <td>".$obj->nombre."</td>
                </tr>
                <tr>
                  <td id='tabla'><b>Fecha</b></td>
                  <td >".$obj->fecha."</td>
                </tr>
                <tr>
                  <td id='tabla'><b>Director</b></td>
                  <td >".$obj->director."</td>
                </tr>
                <tr>
                  <td id='tabla'><b>Música</b></td>
                  <td >".$obj->musica."</td>
                </tr>
                <tr>
                  <td id='tabla'><b>Clasificación</b></td>
                  <td >".$obj->clasificacion."</td>
                </tr>
              </table>
              </center>
              <center>
                <a href='letra.php?codAgrupacion=".$codigo."'><input type='button' value='Letras' class='btn btn-warning'></a> <a href='grupo.php'><input type='button' value='Volver' class='btn btn-warning'></a>
              </center>
              </div>
            </div>
          ";
        }
        echo "</div>";
      }
      ?>
    <?php else: ?>
      <?php
      $nombre=$_POST["nombre"];
      $query="SELECT *, year(fecha) as fecha from agrupacion a join fecha f on a.codagrupacion=f.codagrupacion where nombre like '%".$nombre."%'";
      if ($result = $connection->query($query)) {
        echo "<div class='container'>";
        menu();
        while ($obj = $result->fetch_object()) {
          $codigo=$obj->codAgrupacion;
          echo "
          <div class='row align-items-center'>
            <div class='col-md-6'>
              <center>
                <img src='".$obj->foto."' alt='' class='img rounded'>
              </center>
            </div>
            <div class='col-md-6'>
            <center>
            <table>
              <tr>
                <td id='tabla'><b>Nombre</b></td>
                <td>".$obj->nombre."</td>
              </tr>
              <tr>
                <td id='tabla'><b>Fecha</b></td>
                <td >".$obj->fecha."</td>
              </tr>
              <tr>
                <td id='tabla'><b>Director</b></td>
                <td >".$obj->director."</td>
              </tr>
              <tr>
                <td id='tabla'><b>Música</b></td>
                <td >".$obj->musica."</td>
              </tr>
              <tr>
                <td id='tabla'><b>Clasificación</b></td>
                <td >".$obj->clasificacion."</td>
              </tr>
            </table>
            </center>
            <center>
              <a href='letra.php?codAgrupacion=".$codigo."'><input type='button' value='Letras' class='btn btn-warning'></a> <a href='grupo.php'><input type='button' value='Volver' class='btn btn-warning'></a>
            </center>
            </div>
          </div>
          ";
          }
          echo "</div>";
        }
        ?>
      <?php endif; ?>
    <?php endif; ?>
    <?php
    copyright();
    script();
    exit();
    ?>
  </body>
</html>
