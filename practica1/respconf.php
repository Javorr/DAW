<?php
session_start();

if(isset($_COOKIE['last_visit'])) {
  $current_visit = date("c");
  setcookie("last_visit", $current_visit, (time()+60*60*24*90), $secure = true);
}

if(isset($_GET['est'])){

  require("requires/mysqli.php");

  $sql = "UPDATE usuarios SET Estilo = {$_GET['est']} WHERE NomUsuario = '{$_SESSION['nombre']}'";
  $consulta = $mysqli->query($sql);

  $sql2 = "SELECT * FROM estilos where estilos.IdEstilo={$_GET['est']}";
  $consulta2 = $mysqli->query($sql2);
  $fila2 = $consulta2->fetch_assoc();

  $correcto = 'true';
  $estilo = "{$fila2["Fichero"]}";

  $_SESSION['estilo'] = $estilo;


require_once("requires/cabecera.php");
require_once("requires/inicio.php");
require_once("requires/ensesion.php");


echo "<p>Configuración modificada</p>";

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
