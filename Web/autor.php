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
    <div class="container">
      <div class="row">
        <?php if (!isset($_GET["codAutor"])): ?>
          <div class="col-md-12">
            <h3 id="pad"><u>Los autores del carnaval:</u></h3>
            <?php
            echo "<ul>";
            $query="SELECT * from autor order by nombre";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                echo "<li><a href='autor.php?codAutor=".$obj->codAutor."'>".$obj->nombre." ".$obj->apellidos."</a></li>";
              }
            }
            echo "</ul>";
            ?>
          </div>
        <?php else: ?>
          <div class="col-md-4">
            <?php
            echo "<ul>";
            $query="SELECT * from autor order by nombre";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                echo "<li><a href='autor.php?codAutor=".$obj->codAutor."'>".$obj->nombre." ".$obj->apellidos."</a></li>";
              }
            }
            echo "</ul>";
            ?>
          </div>
          <div class="col-md-8">
            <?php
            $codigo=$_GET["codAutor"];
            $query="SELECT * from autor where codAutor='$codigo'";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                echo "<h3 id='pad'><u>".$obj->nombre." ".$obj->apellidos.": </u></h3>";
                echo "<p>".$obj->biografia."</p>";
              }
            }
            ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <?php
    copyright();
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
