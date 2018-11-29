<?php
session_start();

if(isset($_COOKIE['last_visit'])) {
  $current_visit = date("c");
  setcookie("last_visit", $current_visit, (time()+60*60*24*90), $secure = true);
}

if(isset($_SESSION['nombre'])){
require_once("requires/cabecera.php");
require_once("requires/inicio.php");
require_once("requires/ensesion.php");
require("requires/mysqli.php");


$sql = "INSERT INTO `fotos` (`Titulo`, `Descripcion`, `Fecha`, `Pais`, `Album`, `Fichero`, `Alternativo`) VALUES ('{$_POST['Titulo']}', '{$_POST['fdescripcion']}', '{$_POST['fecha']}', '{$_POST['pa']}', '{$_POST['alb']}', '{$_POST['foto']}', '{$_POST['textalt']}')";
$consulta = $mysqli->query($sql);
echo "voy ".$sql;

echo<<<EOF
  <section>
      <h2>Fotografía subida</h2>
      <p>Se ha subido la siguiente imagen:</p>
      <ul id='album'>
          <li>Título: {$_POST['Titulo']} </li>
          <li>Descripción: {$_POST['fdescripcion']} </li>
          <li>Fecha: {$_POST['fecha']}</li>
          <li>País: {$_POST['pa']}</li>
          <li>Álbum: {$_POST['alb']} </li>
          <li>Fichero:  {$_POST['foto']} </li>
          <li>Texto alternativo: {$_POST['textalt']} </li>
      </ul>
    </section>
EOF;


 $volver="index.php";
require_once("requires/pie.php");
}
else {
$host = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';
header("Location: http://$host$uri/$extra");
exit;
}
?>
