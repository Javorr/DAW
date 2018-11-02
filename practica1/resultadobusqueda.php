<!--  Página con el listado resultado de una búsqueda
    Contiene un listado con un resumen (foto, título, fecha y país) de las fotos que cumplen los criterios de una búsqueda. -->

    <?php
    session_start();
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/sinsesion.php");
    require_once("requires/formulariobus.php");
     ?>

    <h2>Resultado</h2>

    <?php

      error_reporting(0);
      $titulo = $_GET['titulo']; if($titulo=='') $titulo = '---';
      $fechai = $_GET['fechai']; if($fechai=='') $fechai = '---';
      $fechaf = $_GET['fechaf']; if($fechaf=='') $fechaf = '---';

      $pais = $_GET['pais'];
      if($pais == '') $paisl = '---';
      if($pais == 'spa') $paisl = 'España';
      if($pais == 'fr') $paisl = 'Francia';
      if($pais == 'pt') $paisl = 'Portugal';

echo<<<EOF
      <p>Resultados para fotos con título "$titulo" entre las fechas $fechai y $fechaf del país $paisl.</p>
EOF;

      require_once("requires/fotos.php");


     $volver="index.php";
    require_once("requires/pie.php"); ?>
