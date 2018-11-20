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

$mysqli = new mysqli("localhost", "root", "root", "pibd");
if($mysqli -> connect_errno) echo "<p>mal asunto</p>";
//else echo "<p>tamos dentro</p>";

$sentencia = "SELECT * from Fotos where Album='{$_GET['idalb']}'";
$fotos = $mysqli->query($sentencia);
if(!$fotos || $mysqli->errno) echo "<p>mal asunto</p>";
//else echo "<p>lo tenemo</p>";

while($fila = $fotos->fetch_assoc()){
  echo "<p>{$fila['Titulo']}, {$fila['Fichero']}</p><br/>";
}

$sentencia2 = "SELECT * from Albumes where IdAlbum='{$_GET['idalb']}'";
$albb = $mysqli->query($sentencia2);
$resp = $albb->fetch_assoc();

echo<<<EOF
    <h2> Álbum </h2>
    <a>{$resp['Titulo']}: {$resp['Descripcion']}</a>
EOF;

     $volver="index.php";
    require_once("requires/pie.php");
  }
  else{
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
  }

?>
