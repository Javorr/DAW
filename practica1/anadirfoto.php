<?php
session_start();

if(isset($_COOKIE['last_visit'])) {
  $current_visit = date("c");
  setcookie("last_visit", $current_visit, (time()+60*60*24*90), $secure = true);
}

if (isset($_COOKIE['nombre']) and isset($_COOKIE['cont'])) {
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

$idusu = $usuario->fetch_assoc();
$id = $idusu['IdUsuario'];

$sentencia = "SELECT * from Paises order by NomPais";
$paises = $mysqli->query($sentencia);

$sentencia = "SELECT * from Albumes where Usuario='$id'";
$albumes = $mysqli->query($sentencia);
//if(!$albumes || $mysqli->errno) echo "<p>mal asunto</p>";

echo<<<EOF
    <h2> Añadir foto </h2>

    <section>
        <form action="respanadirfoto.php" id="fot" method="POST">

        <label for="fitulo">Título: </label><br><input id="fitulo" type="text" name="Titulo" placeholder="Título" required><br>
        <label for="fdescripcion">Descripción: </label><br><input id="fdescripcion" type="text" name="fdescripcion" placeholder="Descripción"><br>
        <label for="ffecha">Fecha: </label><br><input id="ffecha" type="date" name="fecha"><br> <!-- warning puesto que date no lo soportan todos los navegadores-->
        <label for="ftextoalt">Texto alternativo: </label><br><input id="ftextoalt" type="text" name="textalt" placeholder="Texto alternativo"><br>
        <label for="selalb">Seleccionar álbum:</label><br>
        <select id="selalb" name="alb">
EOF;

    if(isset($_GET['alb'])){
      $sentencia = "SELECT * from Albumes where IdAlbum='{$_GET['alb']}'";
      $albumes1 = $mysqli->query($sentencia);
      $fila1 = $albumes1->fetch_assoc();

      if ($albumes1->num_rows > 0) {
        echo "<option value='{$fila1['IdAlbum']}'>{$fila1['Titulo']}</option>";
      }

      else{
        while($fila = $albumes->fetch_assoc()){
          echo "<option value='{$fila['IdAlbum']}'>{$fila['Titulo']}</option>";
        }
      }

    }

    else{
        while($fila = $albumes->fetch_assoc()){
          echo "<option value='{$fila['IdAlbum']}'>{$fila['Titulo']}</option>";
        }
    }

echo<<<EOF
        </select>
        <label for="selpa">Seleccionar país:</label><br>
        <select id="selpa" name="pa">
EOF;

        while($fila = $paises->fetch_assoc()){
          echo "<option value='{$fila['IdPais']}'>{$fila['NomPais']}</option>";
        }

echo<<<EOF
        </select>

        <label for="ffoto">Foto: </label><br><input id="ffoto" type="file" name="foto" required><br>

            <input type="submit" name="submit" value="Añadir foto"><br />
        </form>
    </section>

EOF;

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
