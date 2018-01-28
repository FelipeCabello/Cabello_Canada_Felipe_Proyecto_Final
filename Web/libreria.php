<?php

function copyright(){
  /* Texto de copyright */
  echo "<center><p> Copyright (c) 2018 Copyright Holder All Rights Reserved. </p></center><br></br>";
};

function menu(){
  /* Barra del menu */
    echo "
    <div class='container'>
      <nav class='navbar navbar-inverse'>
        <div class='container-fluid'>
          <div class='navbar-header'>
            <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
              <span class='icon-bar'></span>
              <span class='icon-bar'></span>
              <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' href='#' style='font-size: 24px' ><b>Oh, Cádiz!</b></a>
          </div>
          <div class='collapse navbar-collapse' id='myNavbar'>
            <ul class='nav navbar-nav'>
              <li><a href='inicio.php'>Inicio</a></li>
              <li><a href='autor.php'>Autor</a></li>
              <li><a href='grupo.php'>Grupo</a></li>
              <li><a href='coac.php'>COAC</a></li>
            </ul>
            <ul class='nav navbar-nav navbar-right'>
              <li><a href='#'><span class='glyphicon glyphicon-user'></span>"; echo $_SESSION['usuario']; echo "</a></li>
              <li><a href='../sesion.php'><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <hr>
    </div>
    ";
};

function head() {
  echo "
  <head>
    <title>Oh, Cádiz!</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='shortcut icon' href='../imagenes/favicon.ico' type='image/x-icon'>
    <link rel='icon' href='../imagenes/favicon.ico' type='image/x-icon'>
    <link rel='stylesheet' href='../bootstrap/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../estilo.css'>
  </head>
  ";
}

function script() {
  echo "
  <script src='../bootstrap/jquery/jquery.min.js'></script>
  <script src='../bootstrap/js/bootstrap.min.js'></script>
  ";
}

?>
