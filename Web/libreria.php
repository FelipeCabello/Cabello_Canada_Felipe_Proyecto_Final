<?php

function copyright(){
  /* Texto de copyright */
  echo "<center><p> Copyright (c) 2018 Copyright Holder All Rights Reserved. </p></center><br></br>";
};

function menu(){
  /* Barra del menu */
    echo "
    <div class='container'>
      <nav class='navbar navbar-toggleable-md navbar-light bg-faded'>
        <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarText' aria-controls='navbarText' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <a class='navbar-brand' href='inicio.php'><b>Oh, Cádiz!</b></a>
        <div class='collapse navbar-collapse' id='navbarText'>
          <ul class='navbar-nav mr-auto'>
            <li class='nav-item active'>
              <a class='nav-link' href='inicio.php'>Home</a>
            </li>
            <li class='nav-item active'>
              <a class='nav-link' href='autor.php'>Autor</a>
            </li>
            <li class='nav-item active'>
              <a class='nav-link' href='grupo.php'>Grupo</a>
            </li>
            <li class='nav-item active'>
              <a class='nav-link' href='coac.php'>COAC 2018</a>
            </li>

          </ul>
          <ul class='navbar-nav' style='float:right'>
            <li class='nav-item dropdown active' style='float: right'>
              <a class='nav-link dropdown-toggle' href='../sesion.php' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                echo $_SESSION['usuario'];
              echo "</a>
              <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink' style='left: -130%;'>
                <a class='dropdown-item' href='#'>Editar mi perfil</a>
                <a class='dropdown-item' href='../sesion.php'>Cerrar sesión</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    ";
};

function head() {
  echo "
  <head>
    <title>Oh, Cádiz!</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel='shortcut icon' href='../imagenes/favicon.ico' type='image/x-icon'>
    <link rel='icon' href='../imagenes/favicon.ico' type='image/x-icon'>
    <link rel='stylesheet' href='../bootstrap/css/bootstrap.min.css' integrity='sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ' crossorigin='anonymous'>
    <link rel='stylesheet' href='../estilo.css'>
  </head>
  ";
}

function script() {
  echo "
  <script src='../bootstrap/jquery/jquery-3.1.1.slim.min.js' integrity='sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n' crossorigin='anonymous'></script>
  <script src='../bootstrap/js/bootstrap.min.js' integrity='sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn' crossorigin='anonymous'></script>
  <script src='../bootstrap/js/tether.min.js' integrity='sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb' crossorigin='anonymous'></script>
  ";
}

function basedatos() {
  $connection = new mysqli("localhost", "root", "Admin2015", "wikicarnaval", 3316);
  $connection->set_charset("utf8");
  if ($connection->connect_errno) {
      printf("Connection failed: %s\n", $connection->connect_error);
      exit();
  }

  return $connection;
}

?>
