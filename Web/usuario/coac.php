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
    menu();
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <center>
          <h3><u>SESIÓN 1 - MARTES 9 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La sonrisa de Dios</td>
                <td>No me toques las bolas</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>La familia verdugo</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los vivelavida</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Regreso del futuro</td>
                <td>Los Once</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Se buscan valientes</td>
                <td>Los Prodigiosos</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Una corrida en tu cara</td>
                <td>Esta chirigota cae bien</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>El almacén</td>
                <td>La comparsa de la reina</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 2 - MIÉRCOLES 10 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Dónde meto el elefante en el piso de estudiantes?</td>
                <td>Gora ke hay, partido independentista de Kai</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Este gitano está majara</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CUARTETO</td>
                <td>El equipo A minúscula (Comando Caleti)</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los noctámbulos</td>
                <td>Los incondicionales</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los no aptos</td>
                <td>Al destierro</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>El rincón del duende</td>
                <td>Los depredadores</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los que van a su bola</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 3 - JUEVES 11 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>Rockola</td>
                <td>La reina de la noche <i>(4º PREMIO)</i></td><td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>El circo de la sombra</td>
                <td>Los machos ibéricos</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La perla dorada</td>
                <td>Color Esperanza</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los que vienen de vuelta</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Las irrepetibles</td>
                <td>Una voz de madera</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los Quitapupas</td>
                <td>Los Kunfundios</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La esclavitud</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 4 - VIERNES 12 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>La centuria</td>
                <td>Los del Río</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Con las bombas que tiran</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Pueblo llano</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Gracias a mi gesta sabéis que la tenéis redonda y no recta</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los viva la vida</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CUARTETO</td>
                <td>Los de la gran puñeta</td>
                <td>Los del patronato <i>(2º PREMIO)</i></td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>En blanco y negro</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Sal Fermín</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 5 - SÁBADO 13 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>El Conquistador</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los crazy de los 40</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>El ingeniero</td>
                <td>El penal de los vencidos</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los Campeones</td>
                <td>Al borde del precipicio: Los Rancios</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La oportunidad</td>
                <td>No tengas miedo</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los brujos titis</td>
                <td>Los de Cádiz Norte <i>(2º PREMIO)</i></td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los hombres del rey</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 6 - DOMINGO 14 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>Los nostálgicos de la transición</td>
                <td>Los que mueren por salir con el gordo</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los Cazagigantes</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Aquí hay un chivato</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Las guerrilleras</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Felices a las cuatro</td>
                <td>Los gilipuertas</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los prisioneros</td>
                <td>Los Equilibristas <i>(4º PREMIO)</i></td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>AAVV Gruñón Arenillas</td>
                <td>El hombre que susurraba alas almohadas</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 7 - LUNES 15 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>Estamos encantados</td>
                <td>La dinastía</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los maniáticos</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los Desvelaos</td>
                <td>El rinconcito de los milagros</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CUARTETO</td>
                <td>Misión Imposible: Los astromantas</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los ángeles de la guarda</td>
                <td>La Azotea</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>No tenemo el congo pa farolillos</td>
                <td>Los del planeta rojo, pero rojo,rojo <i>(1º PREMIO)</i></td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>El oro negro</td>
                <td>La Brillante</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 8 - MARTES 16 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>Vive, sueña, canta</td>
                <td>El mayor espectáculo del mundo <i>(1º PREMIO)</i></td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La cara oculta de la luna</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Las que embrujaban de verdad</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La inoportuna</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Este año ya nos despedimos</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La niña del viento</td>
                <td>Cádiz</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>El vendedor</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 9 - MIÉRCOLES 17 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>Los queus de Cai</td>
                <td>Arria la carná</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los del convento de Santa María La Yerbabuena</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los Guiritanos</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CUARTETO</td>
                <td>El trío</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La pasarela</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>No te quemes todavía</td>
                <td>No te vayas todavía <i>(3º PREMIO)</i></td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La Playa</td>
                <td>Los Pequeños</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 10 - JUEVES 18 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>Los Chimenea</td>
                <td>El batallón Fletilla <i>(2º PREMIO)</i></td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Las noches de Cádiz</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Como se te caiga, cobras!</td>
                <td>Los que vienen como anillo al dedo</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los Encantadores</td>
                <td>Los Cantores</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los que se meten en toas las conversaciones</td>
                <td>OSEA La Visa es Bella</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>El perro andalú</td>
                <td>La Eternidad <i>(2º PREMIO)</i></td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los que la llevan a hombros</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 11 - VIERNES 19 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>De mil colores</td>
                <td>La hermandad guerrera</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los de San Antonio</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Hermanos</td>
                <td>La cuenta atrás</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Érase una vez La Chirigota</td>
                <td>Qué penita de concurso</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La Justiciera</td>
                <td>Las Valientes</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CUARTETO</td>
                <td>Lo mismo nos vemos en El Cano, que en clases de piano</td>
                <td>Lo que el viento se llevó <i>(1º PREMIO)</i></td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Musicalandia</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Harto palo</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 12 - SÁBADO 20 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>Y sin embargo, te quiero</td>
                <td>El vapor del sur</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los destronados</td>
                <td>El hombre de los mil rostros</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Este año nos veréis en el altar</td>
                <td>Las listas de boda</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La otra mejilla</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Cari, tenemos toda la eternidad</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>OBDC. El joven obispo</td>
                <td>OBDC. La última flor</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>En la ciudad de cadiz siendo las</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La canción perdida</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 13 - DOMINGO 21 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>Don Taratachín</td>
                <td>Por Andalucía <i>(3º PREMIO)</i></td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los que pasan página</td>
                <td>Mi primera cita</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La cumbre</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CUARTETO</td>
                <td>Madre mía</td>
                <td>Pesadilla en España <i>(3º PREMIO)</i></td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La octava maravilla</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Ojú como está el patio!</td>
                <td>Ojú que bochorno!</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>El incomprendido</td>
                <td>El huerto</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 14 - LUNES 22 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>La Mari</td>
                <td>Las atrevidas</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Cómicos</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Cai de miarma (7,20)</td>
                <td>La revolución de las mariposas. Las Frida Khalo</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Las noches de carnaval</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los que miran por encima del hombro</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los Mafiosos</td>
                <td>Los Peregrinos <i>(3º PREMIO)</i></td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>El constructor</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 15 - MARTES 23 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>El diablo se viste de coro</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Por si las moscas</td>
                <td>Ya no salgo más</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La travesía</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los que mueren por su barbi</td>
                <td>La aguja de oro</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Vientos</td>
                <td>Martes XIII</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los Sirenitas</td>
                <td>Pa religión la mía</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 16 - MIÉRCOLES 24 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>La esquinita</td>
                <td>El puzzle</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Dios salve a la Reina</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>La generación del flequillo "palante" no levantamos cabeza</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Juan sin miedo</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Campeones por cojones</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Tic-tac, tic-tac</td>
                <td>El Ángel de Cádiz</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los envidiosos</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 17 - JUEVES 25 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>Tiempos modernos</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Son frescas de la bahía</td>
                <td>Los Cachafantasmas</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>El gurú</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los sensiblones</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los Soñadores</td>
                <td>La Afición</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Grupo de Guasa</td>
                <td>Mi suegra como ya dije <i>(4º PREMIO)</i></td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Algunos hombres buenos</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 18 - VIERNES 26 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>La Comuna</td>
                <td>A toda máquina</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Ahora bajo... que me estoy cambiando</td>
                <td>Los que nunca tiran la toalla</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>El catedrático</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Lo que nos faltaba</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los incontrolables</td>
                <td>Tres mil años</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Qué caló!</td>
                <td>No valemo un duro</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La errante</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los campaneros</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
          <h3><u>SESIÓN 19 - SÁBADO 27 DE ENERO DE 2018</u></h3>
          <table class="tabla table table-bordered">
            <tbody>
              <tr>
                <th>MODALIDAD</th>
                <th>NOMBRE</th>
                <th>COAC 2017</th>
                <th>Sesiones</th>
              </tr>
              <tr>
                <td>CORO</td>
                <td>Las mil y una historias</td>
                <td>Un Cádiz de maravilla</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La gloria</td>
                <td>La leyenda de los guardianes</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Las pinchapelotas</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Los Zincalé</td>
                <td>Los Camballá</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>CHIRIGOTA</td>
                <td>Los jubilados del Soto del relax</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>Ni los buenos son tan buenos ni los malos son tan malos</td>
                <td>Qué corgaera!</td>
                <td>Preliminar</td>
              </tr>
              <tr>
                <td>COMPARSA</td>
                <td>La botellona</td>
                <td>Nueva agrupación</td>
                <td>Preliminar</td>
              </tr>
            </tbody>
          </table>
        </center>
        </div>
      </div>
    </div>
    <?php
    copyright();
    script();
    ?>
  </body>
</html>
