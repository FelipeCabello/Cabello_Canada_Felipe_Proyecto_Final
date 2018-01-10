<?php

function copyright(){
  /* Texto de copyright */
  echo "<center style='color:#231F20'> Copyright (c) 2018 Copyright Holder All Rights Reserved. </center><br></br>";
}

function menu(){
  /* Barra del menu */
  echo "
  <div class='container'>
      <div class='row' style='padding-right:10px; padding-left:10px;'>
        <div class='col-xs-12 col-md-2' style='padding-top:20px; padding-bottom:10px;'>
          <center><a href='inicio.php'><img style='width:80px' src='imagenes/oh.png' alt='logo'></a></center>
        </div>
        <div class='col-xs-2 col-md-1 menu'>
          <a href='inicio.php'><p>Home</p></a>
        </div>
        <div class='col-xs-2 col-md-1 menu'>
          <a href='autor.php'><p>Autor</p></a>
        </div>
        <div class='col-xs-2 col-md-1 menu'>
          <a href='grupo.php'><p>Grupo</p></a>
        </div>
        <div class='col-xs-3 col-md-1 menu'>
          <a href='coac.php'><p>COAC</p></a>
        </div>
        <div id='izq' class='col-xs-3 col-md-6 menu'>
          <a href='sesion.php'><p>Log out</p></a>
        </div>
      </div>
      <hr style='margin-top: -1px'>
    </div>";
}

function letra(){

}

?>
