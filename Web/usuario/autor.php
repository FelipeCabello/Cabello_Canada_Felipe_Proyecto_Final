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
    ?>
    <?php
    menu();
    ?>
    <div class="container">
      <div class="row">
        <?php if (!isset($_GET["codAutor"])): ?>
          <div class="col-md-6">
            <center><img src="../imagenes/falla.jpg" alt="falla" class="img img-rounded"></center>
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
        <?php else: ?>
          <div class="col-md-4">
            <?php
            $codigo=$_GET["codAutor"];
            echo "
            <center>
            <table style='width: 300px;'>
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
  </body>
</html>
