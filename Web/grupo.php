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
    $connection = new mysqli("192.168.1.63", "root", "Admin2015", "wikicarnaval", 3316);
    $connection->set_charset("uft8");
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }
    include_once("libreria.php");
    menu();
    ?>
    <?php if (!isset($_GET["codAgrupacion"]) && !isset($_POST["nombre"])): ?>
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <center><img src="imagenes/letras.jpg" alt="comparsa" class="img img-rounded">
            <form method="post">
              <h3 id="pad">Busca tu agrupacion:</h3>
              <input type='search' name='nombre'> <br></br>
              <input type="submit" value="Buscar" class="btn btn-warning">
            </form>
            </center>
          </div>
          <div class="col-md-7">
            <center>
            <?php
            echo "<table>";
            echo "<tr><th id='size'> - Agrupacion - </th><th id='size'> - Tipo - </th><tr>";
            $query="SELECT * from agrupacion order by nombre";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                echo "
                <tr>
                  <td><a href='grupo.php?codAgrupacion=".$obj->codAgrupacion."'>".$obj->nombre."</a></td>
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
                    <img src='imagenes/grupo/".$obj->codAgrupacion.".jpg' alt='' class='img img-rounded'>
                  </center>
                </div>
                <div class='col-md-6'>
                  <center>
                    <table>
                      <tr><th id='size'> - Info - </th><tr>
                      <tr><td><b>".$obj->nombre."</b></td></tr>
                      <tr><td>Fecha: ".$obj->fecha."</td></tr>
                      <tr><td>Director: ".$obj->director."</td></tr>
                      <tr><td>Música: ".$obj->musica."</td></tr>
                      <tr><td>Clasificación: ".$obj->clasificacion."</td></tr>
                      <tr><td><center><a href='letra.php?codAgrupacion=".$codigo."'><input type='button' value='Letras' class='btn btn-warning'></a> <a href='grupo.php'><input type='button' value='Volver' class='btn btn-warning'></a></center></td></tr>
                    </table>
                  </center>
                </div>
                ";
              }
            }
            ?>
          <?php else: ?>
            <?php
            $nombre=$_POST["nombre"];
            $query="SELECT * from agrupacion where nombre like '%".$nombre."%'";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                $codigo=$obj->codAgrupacion;
                echo "
                <div class='container'>
                  <div class='row'>
                    <div class='col-md-6'>
                      <center><img src='imagenes/grupo/".$obj->codAgrupacion.".jpg' alt='' class='img img-rounded'></center>
                    </div>
                  <div class='col-md-6'>
                    <center>
                      <table>
                        <tr><th id='size'> - Info - </th><tr>
                        <tr><td><b>".$obj->nombre."</b></td></tr>
                        <tr><td>Director: ".$obj->director."</td></tr>
                        <tr><td>Música: ".$obj->musica."</td></tr>
                        <tr><td>Clasificación: ".$obj->clasificacion."</td></tr>
                        <tr><td><center><a href='letra.php?codAgrupacion=".$codigo."'><input type='button' value='Letras' class='btn btn-warning'></a> <a href='grupo.php'><input type='button' value='Volver' class='btn btn-warning'></a></center></td></tr>
                      </table>
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
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
