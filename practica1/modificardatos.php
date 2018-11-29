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

require("requires/mysqli.php");
//if($mysqli -> connect_errno) echo "<p>mal asunto</p>";

$sentencia = "SELECT * from Usuarios where NomUsuario='{$_SESSION['nombre']}'";
$usuario = $mysqli->query($sentencia);
//if(!$usuario || $mysqli->errno) echo "<p>mal asunto</p>";

$fila = $usuario->fetch_assoc();

$sentencia = "SELECT * from Paises";
$paises = $mysqli->query($sentencia);

echo "<h2> Modificar datos </h2>
      <section>
      <form action='respmoddatos.php' id='registro' method='POST'>";
require_once("requires/fregistro.php");

echo"<input type='submit' name='submit' value='Modificar'><br /></form></section>";

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
