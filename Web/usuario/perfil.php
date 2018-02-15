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


    <?php if (isset($_POST["foto"])): ?>
      <?php
      $tmp_file = $_FILES['image']['tmp_name'];
      $target_dir = "../imagenes/perfil/";
      $target_file = strtolower($target_dir . basename($_FILES['image']['name']));
      $valid= true;
      $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
      if ($valid) {
        move_uploaded_file($tmp_file, $target_file);
        $query="SELECT * from usuario where usuario='".$_SESSION["usuario"]."'";
        if ($result = $connection->query($query)) {
          $obj = $result->fetch_object();
          $query2="UPDATE usuario set foto='".$target_file."' where codusuario='".$obj->codUsuario."'";
          if ($connection->query($query2)) {
            if ($_SESSION["foto"]=="../imagenes/perfil/usuario.png") {
              $_SESSION["foto"] = $target_file;
              header('Location: perfil.php');
            } else {
              unlink($_SESSION["foto"]);
              $_SESSION["foto"] = $target_file;
              header('Location: perfil.php');
            }
          }
        }
      }
      ?>
    <?php endif; ?>


    <?php if (isset($_POST["datos"])): ?>
      <?php
      $query="SELECT * from usuario where usuario='".$_SESSION["usuario"]."'";
      if ($result = $connection->query($query)) {
        $obj = $result->fetch_object();
        $query2="UPDATE usuario set usuario='".$_POST["user"]."' , email='".$_POST["email"]."' where codusuario='".$obj->codUsuario."'";
        if ($connection->query($query2)) {
          $_SESSION["usuario"] = $_POST["user"];
          header('Location: perfil.php');
        }
      }
      ?>
    <?php endif; ?>

    <div class="container" >
      <?php menu(); ?>
      <div class="row justify-content-center">
        <div class="col-ms-12 col-md-4">
          <h3>Imagen</h3>
          <hr>
          <img src="<?php echo $_SESSION['foto'] ?>" alt="perfil" class="rounded-circle mx-auto d-block" style="border:2px solid gray; width:200px; height:200px">
          <form method="post" enctype='multipart/form-data'>
            <input class="form-control" type="file" name="image" required style='margin-top:10px; margin-bottom:10px' /><br>
            <center><input type='submit' class='btn btn-lg btn-primary' name='foto' value='Modificar imagen'></center>
          </form>
        </div>
        <div class="col-ms-12 col-md-8">
          <h3>Datos personales</h3>
          <hr>
          <form method="post" >
            <?php
            $query="SELECT * from usuario WHERE usuario='".$_SESSION["usuario"]."'";
            if ($result = $connection->query($query)) {
              $obj = $result->fetch_object();
              echo "
              <span>Usuario</span>
              <input value='$obj->usuario' name='user' type='text' class='form-control' placeholder='Usuario' style='margin-top:10px; margin-bottom:10px' required>
              <span>Correo electrónico</span>
              <input value='$obj->email' name='email' type='email' class='form-control' placeholder='Correo electrónico' style='margin-top:10px; margin-bottom:10px' required><br>
              <center><input type='submit' class='btn btn-lg btn-primary' name='datos' value='¿Quieres modificar algo?'></center>
              ";
            }
            ?>
          </form>
          <h3>Contraseña</h3>
          <hr>
          <form method="post">
            <input class="form-control" type="password" name="password" placeholder='Antigua contraseña' style='margin-top:10px; margin-bottom:10px' required/>
            <input class="form-control" type="password" name="password2" placeholder='Contraseña' style='margin-top:10px; margin-bottom:10px' required/>
            <input class="form-control" type="password" name="password3" placeholder='Repite contraseña' style='margin-top:10px; margin-bottom:10px' required/><br>
            <center><input type='submit' class='btn btn-lg btn-primary' name='contra' value='Cambiar contraseña'></center>
          </form>
          <?php if (isset($_POST["contra"])): ?>
            <?php
            $contra1=$_POST["password"];
            $contra2=$_POST["password2"];
            $contra3=$_POST["password3"];

            $query="SELECT * from usuario where usuario='".$_SESSION["usuario"]."'";
            if ($result = $connection->query($query)) {
              $obj = $result->fetch_object();
              $codigo = $obj->codUsuario;
              $contrasena = $obj->password;
              if ($contrasena==md5($contra1)) {
                if ($contra2==$contra3) {
                  $query2="UPDATE usuario set password=md5('$contra2') where codUsuario=$codigo";
                  if ($connection->query($query2)) {
                  }
                } else {
                  echo "Las nuevas contraseña no coinciden";
                }
              } else {
                echo "La contraseña antigua no coinciden";
              }
            }


            ?>
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
