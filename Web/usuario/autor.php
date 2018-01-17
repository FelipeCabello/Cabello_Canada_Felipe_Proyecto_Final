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
        <?php if (!isset($_GET["codAutor"])): ?>
          <div class="col-md-5">
            <center><img src="../imagenes/falla.jpg" alt="falla" class="img img-rounded"></center>
          </div>
          <div class="col-md-7">
            <center>
              <table>
                <tr>
                  <th id='size'>- Autores del carnaval -</th>
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
                <h3 id='pad'><u>".$obj->nombre." ".$obj->apellidos.": </u></h3>
                <center>
                  <img src='".$obj->foto."' alt='autor' class='img img-rounded'>
                </center>
                <p style='padding-top:20px'>Conocido como ".$obj->apodo."</p>
                <p>Premios: ".$obj->premios."</p>
                <p>Nació en ".$obj->fechaNacimiento."</p>
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
    exit();
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
