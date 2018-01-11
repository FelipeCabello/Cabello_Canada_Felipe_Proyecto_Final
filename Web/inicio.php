<?php
  session_start();
  if (isset($_SESSION["usuario"])) {
  } else {
    session_destroy();
    header("Location: sesion.php");
  }
?>
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
    include_once("libreria.php");
    menu();
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 id="pad"><u>Carnaval de Cádiz</u></h3>
          <center><img style="width: 60%" class="img img-rounded" src="imagenes/cartel.jpg" alt="cartel"></center>
          <p id="pad">
            - Carnaval de Cádiz 2018. De Interés Turístico Internacional. Del 8 al 18 de febrero.<br></br>
            La ciudad entera se vuelca con el carnaval, es una ocasión perfecta para conocerla y disfrutar del ingenio y la gracia de los gaditanos. Cádiz se transforma en una fiesta. Es época de Carnaval.<br></br>
            La música carnavalesca se oye por cualquier rincón de la ciudad, se ultiman los detalles de los disfraces (en Cádiz se conocen como "tipo"), algunos de ellos verdaderas obras de arte y el gaditano vive con toda su alma uno de los acontecimientos lúdicos más esperados, quizá de los carnavales españoles el que tiene una imagen más jocosa y divertida.<br></br>
          </p>
          <h3><u>COAC 2018</u></h3>
          <p>
            El Concurso Oficial de Agrupaciones Carnavalescas 2018 comenzará el 9 de enero, martes, a las 20:30 horas.<br></br>
            Las agrupaciones juveniles actuarán en el Gran Teatro Falla los días 11, 12, 13 y 14 de enero, a partir de las 16 horas; y las infantiles lo harán los días 20 y 21, también a partir de las 16 horas. <br></br>
          </p>
          <h3><u>PREGONERAS</u></h3>
          <p>
            La compañía de Teatro 'Las Niñas de Cádiz', integrada por las hermanas Ana, Alejandra y Rocío López Segovia y Teresa Quintero serán las pregoneras del Carnaval de Cádiz 2018 y anunciarán el inicio de la semana grande de la ciudad el sábado 10 de febrero en la plaza de San Antonio.<br></br>
            El Carnaval ha traspasado las fronteras de lo festivo y cultural y se ha convertido en todo un fenómeno turístico que atrae a miles de visitantes. Los hoteles y alojamientos de toda la Bahía de Cádiz se llenan por completo, por eso te recomendamos que reserves ya tu alojamiento cuanto antes! <br></br>
          </p>
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
