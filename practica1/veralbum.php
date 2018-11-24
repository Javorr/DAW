<?php
session_start();

if(isset($_COOKIE['last_visit'])) {
  $current_visit = date("c");
  setcookie("last_visit", $current_visit, (time()+60*60*24*90), $secure = true);
}

if (isset($_COOKIE['nombre'])) {
   if($_COOKIE['nombre'] == $_COOKIE['cont']){
  $_SESSION['nombre'] = $_COOKIE['nombre'];
  $_SESSION['estilo'] = $_COOKIE['estilo'];
  }
}

if(isset($_SESSION['nombre'])) {
require_once("requires/cabecera.php");
require_once("requires/inicio.php");
require_once("requires/ensesion.php");

require_once("requires/mysqli.php");
//if($mysqli -> connect_errno) echo "<p>mal asunto</p>";


$sentencia = "SELECT * from Fotos where Album='{$_GET['idalb']}' order by FRegistro";
$fotos = $mysqli->query($sentencia);
//if(!$fotos || $mysqli->errno) echo "<p>mal asunto</p>";


$sentencia2 = "SELECT * from Albumes where IdAlbum='{$_GET['idalb']}'";
$albb = $mysqli->query($sentencia2);
$resp = $albb->fetch_assoc();

$sentencia3 = "SELECT distinct NomPais from Paises, Fotos where Album='{$_GET['idalb']}' and Fotos.Pais=Paises.IdPais order by NomPais";
$paises = $mysqli->query($sentencia3);


echo<<<EOF
  <h2> Álbum </h2>
  <p>{$resp['Titulo']}: {$resp['Descripcion']}</p>
  <p>Fotos de:
EOF;

  while($fila = $paises->fetch_assoc()) {
    echo " ".$fila['NomPais'];
  }

  $sentencia4 = "SELECT min(FRegistro), max(FRegistro) from Fotos where Album='{$_GET['idalb']}'";
  $fechas = $mysqli->query($sentencia4);
  $resp2 = $fechas->fetch_assoc();

  echo "</p><p>Realizadas entre ".$resp2['min(FRegistro)']." y ".$resp2['max(FRegistro)'];

  echo "</p><section class='columnas'>";


while($fila = $fotos->fetch_assoc()) {

  $sql2 = "SELECT * FROM paises where paises.IdPais={$fila['Pais']}";
  $consulta2 = $mysqli->query($sql2);
  $fila2 = $consulta2->fetch_assoc();

echo<<<EOF

    <article>
        <h3 title="{$fila["Titulo"]}"><a href="detallefoto.php?id={$fila["IdFoto"]}">{$fila["Titulo"]}</a></h3>
        <a href="detallefoto.php?id={$fila["IdFoto"]}"><img class="fotos" src="{$fila["Fichero"]}" alt="{$fila["Alternativo"]}" width="400"></a>

         <ul>
           <li><time datetime="2018-09">{$fila["FRegistro"]}</time></li>
           <li>{$fila2["NomPais"]}</li>
         </ul>
    </article>

EOF;
}

echo "</section>";

     $volver="index.php";
    require_once("requires/pie.php");
    mysqli_close($mysqli);
  }
  else{
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
  }

?>
