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
    $comentario=true;
    ?>
    <?php if (isset($_GET["borrar"]) ): ?>
      <?php
      $cod = $_GET["borrar"];
      $codagr = $_GET["codAgrupacion"];
      $query="Delete from comentario where codletra=(select codletra from letra l join agrupacion a on l.codagrupacion = a.codagrupacion where a.codagrupacion='$codagr') and codusuario='$cod';";
      if ($connection->query($query)) {
        $codagr = $_GET["codAgrupacion"];
        header("Location: letra.php?codAgrupacion=$codagr");
      }
      ?>
    <?php endif; ?>
    <div class="container" >
      <?php menu(); ?>
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
                <a href='grupo.php'><input type='button' value='Volver' class='btn btn-warning'></a>
              </center>";
              $comentario=false;
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
              <textarea class='form-control' name="comentario" rows="4" style="margin: 0px; width: 80%;" required></textarea><br></br>
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
            $query="SELECT * from usuario u join comentario c on u.codusuario=c.codusuario join letra l on l.codletra=c.codletra where codagrupacion=' ".$_GET["codAgrupacion"]."' ";
            if ($result = $connection->query($query)) {
              while ($obj = $result->fetch_object()) {
                $codagr = $_GET["codAgrupacion"];
                $codusu = $obj->codUsuario;
                if ($obj->usuario==$_SESSION["usuario"]) {
                  echo "
                  <div class='row comentario align-items-center'>
                    <div class='col-10'>
                      <p>El usuario <b>".$obj->usuario."</b> ha puntuado con un <b>".$obj->puntuacion."</b> y ha dicho esto: <br>
                        - ".$obj->comentario." <a style='float:right' href='letra.php?borrar=$codusu&codAgrupacion=$codagr'></p>
                    </div>
                    <div class='col-2'>
                      <img src='../imagenes/borrar.png' alt='delete' style='width:35px'></a>
                    </div>
                  </div> <br></br>";
                } else {
                  echo "
                  <div class='row comentario'>
                      <p>El usuario <b>".$obj->usuario."</b> ha puntuado con un <b>".$obj->puntuacion."</b> y ha dicho esto: <br>
                        - ".$obj->comentario."</p>
                  </div> <br></br>
                  ";
                }
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
