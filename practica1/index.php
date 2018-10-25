
<!--  Página principal
    Contiene enlaces a las distintas páginas que componen el sitio web,
    un formulario (nombre de usuario y contraseña) para acceder como usuario registrado
    y un listado con un resumen (foto, título, fecha, país) de las últimas cinco fotos que se han introducido. -->

<?php
require_once("requires/cabecera.php");
require_once("requires/inicio.php");
require_once("requires/barrabusqueda.php");
require_once("requires/sinsesion.php");
 ?>


    <h2>Últimas fotografías</h2>

    <?php require_once("requires/fotos.php"); ?>

    <!-- En el pie de página incluye los nombres de los autores de la práctica, un aviso de copyright con el año y alguna información más. -->
    <?php $volver="#arriba"; 
    require_once("requires/pie.php"); ?>
