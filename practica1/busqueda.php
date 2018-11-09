<!--  Página con el formulario de búsqueda
    Contiene un formulario para realizar una búsqueda de fotos con los siguientes criterios: título, fecha y país. -->

    <?php
    session_start();
    if(isset($_COOKIE['last_visit'])) {
      $current_visit = date("c");
      setcookie("last_visit", $current_visit, (time()+60*60*24*90), $secure = true);
    }
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/sinsesion.php");
    require_once("requires/formulariobus.php");

      $volver="index.php";
    require_once("requires/pie.php"); ?>
