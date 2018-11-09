
<!--  Página principal
    Contiene enlaces a las distintas páginas que componen el sitio web,
    un formulario (nombre de usuario y contraseña) para acceder como usuario registrado
    y un listado con un resumen (foto, título, fecha, país) de las últimas cinco fotos que se han introducido. -->

<?php
session_start();

if(isset($_COOKIE['last_visit'])) {
  $current_visit = date("c");
  setcookie("last_visit", $current_visit, (time()+60*60*24*90), $secure = true);
}

require_once("requires/cabecera.php");
require_once("requires/inicio.php");
require_once("requires/barrabusqueda.php");
require_once("requires/sinsesion.php");
 ?>


    <h2>Últimas fotografías</h2>

    <?php require_once("requires/fotos.php");

     $volver="#arriba";
    require_once("requires/pie.php");
    if(isset($_GET['error']) and $_GET['error']=='403'){
        echo '<script language="javascript">alert("Debes iniciar sesión para acceder a este contenido");</script>';
    }
    ?>
