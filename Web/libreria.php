<?php

function copyright(){
  /* Texto de copyright */
  echo "<center style='color:#231F20'> Copyright (c) 2018 Copyright Holder All Rights Reserved. </center><br></br>";
}

function menu(){
  /* Barra del menu */
  echo "<div class='container'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-2' style='padding-top:20px; padding-bottom:10px;'>
          <center><a href='inicio.php'><img style='width:80px' src='imagenes/oh.png' alt='logo'></a></center>
        </div>
        <div class='col-xs-3 col-sm-3 col-md-1 menu'>
          <a href='inicio.php'><b><p>Home</p></b> </a>
        </div>
        <div class='col-xs-3 col-sm-3 col-md-1 menu'>
          <a href='autor.php'><b><p>Autor</p></b></a>
        </div>
        <div class='col-xs-3 col-sm-3 col-md-2 menu'>
          <a href='#'><b><p>COAC 2018</p></b></a>
        </div>
        <div id='izq' class='col-xs-3 col-sm-3 col-md-6 menu'>
          <a href='sesion.php'><b><p>Log out</p></b></a>
        </div>
      </div>
      <hr>
    </div>";
}

function conexion(
  $host = '192.168.1.63',
  $usuario = 'root',
  $password = 'Admin2015',
  $basedatos = 'wikicarnaval',
  $puerto = 3316
){
  $connection = new mysqli($host, $usuario, $password, $basedatos, $puerto);
  $connection->set_charset('uft8');
  if ($connection->connect_errno) {
    echo 'Error al conectarse';
    return false;
  };
  return($connection);
}
?>
