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
    include_once("libreria.php");
    menu();
    $comentario = true;
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php if (!isset($_POST["pase"])): ?>
            <form action="letra.php" method="post">
              <h3 id='pad'>Inserta las letras</h3>
              <center>
                <table>
                  <tr>
                    <td>Pase:</td>
                    <td>
                      <select class="form-control" name="pase" required>
                        <option value="Preliminares">Preliminares</option>
                        <option value="Cuartos">Cuartos</option>
                        <option value="Semifinal">Semifinal</option>
                        <option value="Final">Final</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:200px">Presentación:</td>
                    <td><textarea class="form-control" name="presentacion" rows="4" placeholder="Escribe aquí..." required></textarea></td>
                  </tr>
                  <tr>
                    <td>Primer pasodoble: </td>
                    <td><textarea class="form-control" name="pasodobleUno" rows="4" placeholder="Escribe aquí..." required></textarea></td>
                  </tr>
                  <tr>
                    <td>Segundo pasodoble: </td>
                    <td><textarea class="form-control" name="pasodobleDos" rows="4" placeholder="Escribe aquí..." required></textarea></td>
                  </tr>
                  <tr>
                    <td>Cuples pasodoble: </td>
                    <td><textarea class="form-control" name="cuples" rows="4" placeholder="Escribe aquí..." required></textarea></td>
                  </tr>
                  <tr>
                    <td>Popurri: </td>
                    <td><textarea class="form-control" name="popurri" rows="4" placeholder="Escribe aquí..." required></textarea></td>
                    <?php
                    $codigo=$_GET["codAgrupacion"];
                    echo "<td><input type='hidden' name='codAgrupacion' value='".$codigo."' required></td>";
                    ?>
                  </tr>
                </table>
                <input type="submit" name="" value="Insertar" class='btn btn-warning' required>
              </center>
            </form>
          <?php else: ?>
            <?php
            $query="INSERT INTO letra VALUES (DEFAULT, '".$_POST["codAgrupacion"]."', '".$_POST["pase"]."', '".$_POST["presentacion"]."', '".$_POST["pasodobleUno"]."', '".$_POST["pasodobleDos"]."', '".$_POST["cuples"]."', '".$_POST["popurri"]."')";
            if ($connection->query($query)) {
              $codigo = $_POST["codAgrupacion"];
              header("Location: letra.php?codAgrupacion=$codigo");
            }
            ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
          $repetido="";
          $query="SELECT * from agrupacion a join letra l on a.codagrupacion=l.codagrupacion where l.codagrupacion= ".$_GET["codAgrupacion"]."";
          if ($result = $connection->query($query)) {
            if ($result->num_rows==0) {
              echo "
              <p>Lo sentimos, no hemos encontrado ninguna letra de esta agrupación.</p>
              <center>
                </a><a href='grupo.php'><input type='button' value='Volver' class='btn btn-warning'></a>
              </center>";
              $comentario = false;
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
      <?php if ($comentario==true): ?>
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
            $query2="SELECT * from agrupacion a join letra l on a.codagrupacion=l.codagrupacion where l.codagrupacion= ".$_GET["codAgrupacion"]."";
            if ($result = $connection->query($query2)) {
              while ($obj = $result->fetch_object()) {
                $letra=$obj->codLetra;
                $query2="SELECT * from usuario where usuario='".$_SESSION["usuario"]."'";
                if ($result = $connection->query($query2)) {
                  while ($obj = $result->fetch_object()) {
                    $codusuario=$obj->codUsuario;
                    $query4="INSERT into comentario values('".$codusuario."', '".$letra."', '".nl2br($_POST['comentario'])."', '".$_POST['estrellas']."');";
                    if ($connection->query($query4)) {
                    } else {
                      echo "
                      <center>
                        <p>Ya tienes un comentario</p>
                      </center>";
                    }
                  }
                }
              }
            }
            ?>
          <?php endif; ?>
          <div class="col-md-12">
            <hr style="margin-bottom:50px">
            <?php
            $query="SELECT * from usuario u join comentario c on u.codusuario=c.codusuario join letra l on l.codletra=c.codletra where codagrupacion= ".$_GET["codAgrupacion"]." ";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                echo "
                <center>
                  <div class='comentario'>
                    <p id='der'>El usuario <b>".$obj->usuario."</b> ha puntuado con un <b>".$obj->puntuacion."</b> y ha dicho esto: </p>
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
      <?php endif; ?>
    </div>
    <?php
    copyright();
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
