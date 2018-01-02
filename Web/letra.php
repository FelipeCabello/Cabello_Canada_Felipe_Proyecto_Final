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
        <div class="col-md-12">
          <?php
          $repetido="";
          $query="SELECT * from agrupacion a join letra l where a.codagrupacion=l.codagrupacion and a.codagrupacion like ".$_GET["codAgrupacion"]."";
          if ($result = $connection->query($query)) {
            if ($result->num_rows==0) {
              echo "
              <p>Lo sentimos, no hemos encontrado ninguna letra de esta agrupación.</p>
              <center>
                </a><a href='grupo.php'><input type='button' value='Volver' class='btn btn-warning'></a>
              </center>";
            }
            while ($obj = $result->fetch_object()) {
              if ($obj->nombre!=$repetido) {
                echo "<h3 id='pad'><u>".$obj->nombre.", ".$obj->tipo.": </u></h3><br>";
                $repetido=$obj->nombre;
              }
              if (isset($obj->presentacion)) {
                echo "<p style='padding-left:30px'><b>Presentacion de ".$obj->pase."</b><br></br>".nl2br($obj->presentacion)."</p><br></br>";
              }
              if (isset($obj->pasodobleUno)) {
                echo "<p style='padding-left:30px'><b>1º Pasodoble de ".$obj->pase."</b><br></br>".nl2br($obj->pasodobleUno)."</p><br></br>";
              }
              if (isset($obj->pasodobleDos)) {
                echo "<p style='padding-left:30px'><b>2º Pasodoble de ".$obj->pase."</b><br></br>".nl2br($obj->pasodobleDos)."</p><br></br>";
              }
              if (isset($obj->cuples)) {
                echo "<p style='padding-left:30px'><b>Cuples de ".$obj->pase."</b><br></br>".nl2br($obj->cuples)."</p><br></br>";
              }
              if (isset($obj->popurri)) {
                echo "<p style='padding-left:30px'><b>Popurri de ".$obj->pase."</b><br></br>".nl2br($obj->popurri)."</p><br></br>";
              }
            }

          }
          ?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <hr>
          <h3 id='pad'><u>Comenta:</u></h3>
          <form method="post">
            <center>
            <p class="clasificacion">
              <input id="radio1" type="radio" name="estrellas" value="5">
              <label for="radio1">★</label>
              <input id="radio2" type="radio" name="estrellas" value="4">
              <label for="radio2">★</label>
              <input id="radio3" type="radio" name="estrellas" value="3">
              <label for="radio3">★</label>
              <input id="radio4" type="radio" name="estrellas" value="2">
              <label for="radio4">★</label>
              <input id="radio5" type="radio" name="estrellas" value="1">
              <label for="radio5">★</label>
            </p>
            <textarea name="comentario" rows="4" style="margin: 0px; width: 80%;" required></textarea><br></br>
            <input type="submit" name="" value="comentario" class='btn btn-warning'>
            </center>
          </form>
        </div>

        <?php if (isset($_POST["comentario"]) && isset($_POST["estrellas"])): ?>
          <?php
          $query="INSERT into comentario VALUES ('1', '".$_GET['codAgrupacion']."', '".nl2br($_POST['comentario'])."', '".$_POST['estrellas']."')";
          if ($connection->query($query)) {
          } else {
            echo "
            <center>
              <p>Ya tienes un comentario</p>
            </center>";
          }
          ?>
        <?php else: ?>
          <center><p>Debes escribir tu opinion y purtuar si quieres dejar un comentario.</p></center>
        <?php endif; ?>

        <div class="col-md-12">
          <hr style="margin-bottom:50px">
          <?php
          $query="SELECT * from comentario c join usuario u on c.codusuario=u.codusuario where c.codagrupacion like ".$_GET["codAgrupacion"]." ";
          if ($result = $connection->query($query)) {
            while ($obj = $result->fetch_object()) {

              echo "
              <center>
                <div class='comentario'>
                  <p id='der'>El usuario ".$obj->usuario." ha puntuado con un ".$obj->puntuacion." y ha dicho esto: </p>
                    <p id='der'>  - ".$obj->comentario."</p>
                </div>
              </center>
              <br></br>
              ";
            }
          }
          ?>
        </div>
      </div>
    </div>
    <?php
    copyright();
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
