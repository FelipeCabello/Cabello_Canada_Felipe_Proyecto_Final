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
    <div class="container">
      <?php menu(); ?>
      <?php if (!isset($_GET["codAutor"])): ?>
        <div class="row align-items-center">
          <div class="col-md-6">
            <center><img src="../imagenes/falla.jpg" alt="falla" class="img rounded"></center>
          </div>
          <div class="col-md-6">
            <center>
              <table style="width: 300px;">
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
                    <tr>";
                  }
                }
                ?>
              </table>
            </center>
          </div>
        </div>
      <?php else: ?>
        <div class="row">
          <div class="col-md-4">
            <?php
            $codigo=$_GET["codAutor"];
            echo "
            <center >
            <table>
              <tr>
                <th>Otros autores</th>
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
            echo "</table></center>";
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
                <center><img src='".$obj->foto."' alt='autor' class='img rounded'></center>

                <table>
                  <tr>
                  <td>Apodo</td>
                  <td>".$obj->apodo."</td>
                  <tr>
                  <tr>
                  <td>Premios</td>
                  <td>".$obj->premios."</td>
                  <tr>
                  <tr>
                  <td>Fecha nacimiento</td>
                  <td>".$obj->fechaNacimiento."</td>
                  <tr>
                </table>
                <p>".nl2br($obj->biografia)."</p>"
                ;
              }
            }
            ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <?php
    copyright();
    script();
    exit();
    ?>
  </body>
</html>
