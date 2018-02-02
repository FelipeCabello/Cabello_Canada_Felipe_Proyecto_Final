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
    menu();
    ?>
    <div class="container" >
      <div class="row align-items-center">
        <div class="col-md-8">
          <h2 ><u>Carnaval de Cádiz</u></h2>
          <p>
            La ciudad entera se vuelca con el carnaval, es una ocasión perfecta para conocerla y disfrutar del ingenio y la gracia de los gaditanos. Cádiz se transforma en una fiesta. Es época de Carnaval.<br></br>
            La música carnavalesca se oye por cualquier rincón de la ciudad, se ultiman los detalles de los disfraces (en Cádiz se conocen como "tipo"), algunos de ellos verdaderas obras de arte y el gaditano vive con toda su alma uno de los acontecimientos lúdicos más esperados, quizá de los carnavales españoles el que tiene una imagen más jocosa y divertida.<br></br>
          </p>
        </div>
        <div class="col-md-4">
          <center><img style="margin-top: 15px;" class="img rounded" src="../imagenes/cartel.jpg" alt="cartel"><br>
          <p>- Carnaval de Cádiz 2018 -</p></center>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2><u>COAC 2018</u></h2>
          <p>
            El Concurso Oficial de Agrupaciones Carnavalescas 2018 comenzará el 9 de enero, martes, a las 20:30 horas.<br></br>
            Las agrupaciones juveniles actuarán en el Gran Teatro Falla los días 11, 12, 13 y 14 de enero, a partir de las 16 horas; y las infantiles lo harán los días 20 y 21, también a partir de las 16 horas. <br></br>
          </p>
          <h2><u>PREGONERAS</u></h2>
          <p>
            La compañía de Teatro 'Las Niñas de Cádiz', integrada por las hermanas Ana, Alejandra y Rocío López Segovia y Teresa Quintero serán las pregoneras del Carnaval de Cádiz 2018 y anunciarán el inicio de la semana grande de la ciudad el sábado 10 de febrero en la plaza de San Antonio.<br></br>
            El Carnaval ha traspasado las fronteras de lo festivo y cultural y se ha convertido en todo un fenómeno turístico que atrae a miles de visitantes. Los hoteles y alojamientos de toda la Bahía de Cádiz se llenan por completo, por eso te recomendamos que reserves ya tu alojamiento cuanto antes! <br></br>
          </p>
        </div>
      </div>
    </div>
    <?php
    copyright();
    script();
    ?>
  </body>
</html>
