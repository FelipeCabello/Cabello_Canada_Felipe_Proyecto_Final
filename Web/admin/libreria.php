<?php

function copyright(){
  /* Texto de copyright */
  echo "<center style='color:#231F20'> Copyright (c) 2018 Copyright Holder All Rights Reserved. </center><br></br>";
};

function menu(){
  /* Barra del menu */
    echo "<div class='container'>
      <div class='row'>
        <div class='col-xs-12 col-md-2' style='padding-top:20px; padding-bottom:10px;'>
          <center><a href='inicio.php'><img style='width:80px' src='../imagenes/oh.png' alt='logo'></a></center>
        </div>
        <div class='col-xs-9 col-md-7 menu'>
          <ul>
            <a href='inicio.php'><li><b>Home</b></li></a>
            <a href='autor.php'><li><b>Autor</b></li></a>
            <a href='grupo.php'><li><b>Grupo</b></li></a>
            <a href='coac.php'><li><b>COAC</b></li></a>
          </ul>
        </div>
        <div class='col-xs-3 col-md-3 menu'>
          <ul>
            <li><b>"; echo $_SESSION['usuario']; echo "</b></li>
            <a href='../sesion.php'><li><b>Log out</b></li></a>
          </ul>
        </div>
      </div>
      <hr style='margin: 0px; color: #F9F9F9;'>
    </div>
    ";
};

?>
