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
  <?php include_once("../libreria.php"); head(); ?>
  <body>
    <?php
    $connection = basedatos();
    ?>
    <div class="container" >
      <?php menu(); ?>
      <div class="row">
        <div class="col-md-12">
          <?php if (isset($_GET["codautor"]) || isset($_GET["codLetra"]) || isset($_GET["codAgrupacion"])): ?>
            <?php if (isset($_GET["codautor"])): ?>
              <!-- Codigo UPDATE autor -->
              <?php
              $query="SELECT * FROM autor WHERE codAutor='".$_GET["codautor"]."'";
              if ($result = $connection->query($query)) {
                while ($obj = $result->fetch_object()) {
                  echo "
                  <form action='modificar.php' method='post' enctype='multipart/form-data'>
                    <h3>Modifica el autor ".$obj->nombre." ".$obj->apellidos."</h3>
                    <center><img src='".$obj->foto."' alt='autor' class='img rounded' style='width:50%'></center>
                    <center>
                      <table style='width:80%; margin:20px'>
                        <tr>
                          <td id='formu'>Nombre: </td>
                          <td><input class='form-control' type='text' name='nombre' value='".$obj->nombre."' required></td>
                        </tr>
                        <tr>
                          <td id='formu'>Apellidos: </td>
                          <td><input class='form-control' type='text' name='apellidos' value='".$obj->apellidos."' required></td>
                        </tr>
                        <tr>
                          <td id='formu'>Apodo: </td>
                          <td><input class='form-control' type='text' name='apodo' value='".$obj->apodo."' required></td>
                        </tr>
                        <tr>
                          <td id='formu'>Fecha Nacimiento: </td>
                          <td><input class='form-control' type='date' name='fechaNacimiento' value='".$obj->fechaNacimiento."' required></td>
                        </tr>
                        <tr>
                          <td id='formu'>Premios: </td>
                          <td><input class='form-control' type='text' name='premios' value='".$obj->premios."' required></td>
                        </tr>
                        <tr>
                          <td id='formu'>Biografia: </td>
                          <td><textarea class='form-control' name='biografia' rows='4' required>".$obj->biografia."</textarea></td>
                        </tr>
                        <tr>
                          <td id='formu'>Foto: </td>
                          <td><input class='form-control' type='file' name='image' /></td>
                        </tr>
                        <tr>
                          <td colspan='2' style='padding-top:20px'><center><input type='submit' name='' value='Modificar' class='btn btn-warning' required></center></td>
                        </tr>
                        <tr>
                          <td><input type='hidden' name='codAutor' value='".$obj->codAutor."' required></td>
                          <td><input type='hidden' name='foto' value='".$obj->foto."' required></td>
                        </tr>
                      </table>
                    </center>
                  </form>
                  ";
                }
              }
              ?>
            <?php endif; ?>
            <?php if (isset($_GET["codAgrupacion"])): ?>
              <!-- Codigo update Agrupacion -->
              <?php
              $query="SELECT a.nombre, tipo, musica, director, clasificacion, localidad, a.foto, f.codautor, f.codagrupacion, fecha, u.nombre as autor
              from agrupacion a join fecha f on a.codagrupacion=f.codagrupacion join autor u on u.codautor=f.codautor where a.codagrupacion='".$_GET["codAgrupacion"]."'";
              if ($result = $connection->query($query)) {
                while ($obj = $result->fetch_object()) {
                  echo "
                  <form action='modificar.php' method='post' enctype='multipart/form-data'>
                    <h3>Modifica el autor ".$obj->nombre."</h3>
                    <center><img src='".$obj->foto."' alt='agrupacion' class='img rounded' style='width:50%'></center>
                    <center>
                      <table style='width:80%; margin:20px'>
                        <tr>
                          <td><input type='hidden' name='codAgrupacion' value='".$obj->codagrupacion."' required></td>
                          <td><input type='hidden' name='fotoagrupacion' value='".$obj->foto."' required></td>
                        </tr>

                        <tr>
                          <td id='formu'>Nombre: </td>
                          <td><input class='form-control' type='text' name='nombre' value='".$obj->nombre."' required></td>
                        </tr>
                        <tr>
                          <td id='formu'>Tipo: </td>
                          <td><input class='form-control' type='text' name='tipo' value='".$obj->tipo."' required></td>
                        </tr>
                        <tr>
                          <td id='formu'>Música: </td>
                          <td><input class='form-control' type='text' name='musica' value='".$obj->musica."' required></td>
                        </tr>
                        <tr>
                          <td id='formu'>Director: </td>
                          <td><input class='form-control' type='text' name='director' value='".$obj->director."' required></td>
                        </tr>
                        <tr>
                          <td id='formu'>Clasificacion: </td>
                          <td><input class='form-control' type='text' name='clasificacion' value='".$obj->clasificacion."' required></td>
                        </tr>
                        <tr>
                          <td id='formu'>Año: </td>
                          <td><input class='form-control' type='date' name='fecha' value='".$obj->fecha."' required></td>
                        </tr>
                        <tr>
                          <td id='formu'>Localidad: </td>
                          <td><input class='form-control' type='text' name='localidad' value='".$obj->localidad."' required></td>
                        </tr>
                        <tr>
                          <td id='formu'>Foto: </td>
                          <td><input class='form-control' type='file' name='imagen'></td>
                        </tr>
                        <tr>
                          <td colspan='2' style='padding-top:20px'><center><input type='submit' name='' value='Enviar' class='btn btn-warning' required></center></td>
                        </tr>
                      </table>
                    </center>
                  </form>
                  ";
                }
              }
              ?>
            <?php endif; ?>
            <?php if (isset($_GET["codLetra"])): ?>
              <?php
              $query="SELECT * from letra where codLetra='".$_GET["codLetra"]."'";
              if ($result = $connection->query($query)) {
                $obj = $result->fetch_object();
                echo "
                <form action='modificar.php' method='post'>
                  <h3>Inserta las letras</h3>
                  <center>
                    <table class='table' style='width:80%; margin:20px'>
                      <tr>
                        <td id='formu'>Pase:</td>
                        <td>
                          <select class='form-control' name='pase' required>
                            <option value='$obj->pase'>Opción sin modificar: $obj->pase</option>
                            <option value='Preliminares'>Preliminares</option>
                            <option value='Cuartos'>Cuartos</option>
                            <option value='Semifinal'>Semifinal</option>
                            <option value='Final'>Final</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td id='formu'>Presentación:</td>
                        <td><textarea class='form-control' name='presentacion' required>$obj->presentacion</textarea></td>
                      </tr>
                      <tr>
                        <td id='formu'>Primer pasodoble: </td>
                        <td><textarea class='form-control' name='pasodobleUno' required>$obj->pasodobleUno</textarea></td>
                      </tr>
                      <tr>
                        <td id='formu'>Segundo pasodoble: </td>
                        <td><textarea class='form-control' name='pasodobleDos' required>$obj->pasodobleDos</textarea></td>
                      </tr>
                      <tr>
                        <td id='formu'>Cuples pasodoble: </td>
                        <td><textarea class='form-control' name='cuples' rows='4' required>$obj->cuples</textarea></td>
                      </tr>
                      <tr>
                        <td id='formu'>Popurri: </td>
                        <td><textarea class='form-control' name='popurri' required>$obj->popurri</textarea></td>
                      </tr>
                      <input type='hidden' name='codAgrupacion' value='$obj->codAgrupacion' required></td>
                      <input type='hidden' name='codLetra' value='".$_GET['codLetra']."' required></td>
                    </table>
                    <input type='submit' name='changeletra' value='Insertar' class='btn btn-warning' required>
                  </center>
                </form>
                ";
              }
              ?>
            <?php endif; ?>
          <?php else: ?>
            <?php if (isset($_POST["biografia"])): ?>
              <!-- Si quieres hacer un update de Autor -->
              <?php if (isset($_FILES['image'])): ?>
                <?php
                $tmp_file = $_FILES['image']['tmp_name'];
                $target_dir = "../imagenes/autores/";
                $target_file = strtolower($target_dir . basename($_FILES['image']['name']));
                $valid= true;
                if (file_exists($target_file)) {
                  # Si la imagen coincide con la que ya tenia, solo haremos un update de todo lo demas
                  $query2="UPDATE autor set nombre='".$_POST['nombre']."', apellidos='".$_POST['apellidos']."', apodo='".$_POST['apodo']."', fechaNacimiento='".$_POST['fechaNacimiento']."', biografia='".$_POST['biografia']."', premios='".$_POST['premios']."', foto='".$_POST['foto']."' WHERE codAutor='".$_POST['codAutor']."'";
                  if ($result = $connection->query($query2)) {
                    header('Location: autor.php');
                  }
                  $valid = false;
                }
                $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
                if ($valid) {
                  var_dump($target_file);
                  move_uploaded_file($tmp_file, $target_file);
                  $query2="UPDATE autor set nombre='".$_POST['nombre']."', apellidos='".$_POST['apellidos']."', apodo='".$_POST['apodo']."', fechaNacimiento='".$_POST['fechaNacimiento']."', biografia='".$_POST['biografia']."', premios='".$_POST['premios']."', foto='$target_file' WHERE codAutor='".$_POST['codAutor']."'";
                  if ($result = $connection->query($query2)) {
                    header('Location: autor.php');
                  }
                }
                ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php if (isset($_POST["tipo"])): ?>
              <!-- Si quieres hacer un update de Agrupacion -->
              <?php if (isset($_FILES['imagen'])): ?>
                <?php
                $tmp_file = $_FILES['imagen']['tmp_name'];
                $target_dir = "../imagenes/grupo/";
                $target_file = strtolower($target_dir . basename($_FILES['imagen']['name']));
                $valid= true;
                if (file_exists($target_file)) {
                  # Si la imagen coincide con la que ya tenia, solo haremos un update de todo lo demas
                  $query5="UPDATE agrupacion
                  set nombre='".$_POST['nombre']."',
                  tipo='".$_POST['tipo']."',
                  musica='".$_POST['musica']."',
                  director='".$_POST['director']."',
                  clasificacion='".$_POST['clasificacion']."',
                  localidad='".$_POST['localidad']."',
                  foto='".$_POST['fotoagrupacion']."'
                  WHERE codAgrupacion='".$_POST['codAgrupacion']."'";
                  if ($result = $connection->query($query5)) {
                    $query6="UPDATE fecha set fecha='".$_POST['fecha']."' where codAgrupacion='".$_POST['codAgrupacion']."'";
                    if ($result = $connection->query($query6)) {
                      header('Location: grupo.php');
                    }
                  }
                  $valid = false;
                }
                $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
                if ($valid) {
                  var_dump($target_file);
                  move_uploaded_file($tmp_file, $target_file);
                  $query3="UPDATE agrupacion
                  set nombre='".$_POST['nombre']."',
                  tipo='".$_POST['tipo']."',
                  musica='".$_POST['musica']."',
                  director='".$_POST['director']."',
                  clasificacion='".$_POST['clasificacion']."',
                  localidad='".$_POST['localidad']."',
                  foto='$target_file'
                  WHERE codAgrupacion='".$_POST['codAgrupacion']."'";
                  if ($result = $connection->query($query3)) {
                    $query4="UPDATE fecha set fecha='".$_POST['fecha']."' WHERE codAgrupacion='".$_POST['codAgrupacion']."';";
                    if ($result = $connection->query($query4)) {
                      header('Location: grupo.php');
                    }
                  }
                }
                ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php if (isset($_POST["pasodobleDos"])): ?>
              <?php
              echo "hola";
              $query="UPDATE letra set
              codAgrupacion='".$_POST["codAgrupacion"]."',
              pase='".$_POST["pase"]."',
              presentacion='".$_POST["presentacion"]."',
              pasodobleUno='".$_POST["pasodobleUno"]."',
              pasodobleDos='".$_POST["pasodobleDos"]."',
              cuples='".$_POST["cuples"]."',
              popurri='".$_POST["popurri"]."'
              where codLetra='".$_POST["codLetra"]."'";
              echo $query;
              if ($connection->query($query)) {
                $codigo=$_POST["codAgrupacion"];
                header("Location: letra.php?codAgrupacion=$codigo");
              }
              ?>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php
    copyright();
    script();
    exit();
    ?>
  </body>
</html>
