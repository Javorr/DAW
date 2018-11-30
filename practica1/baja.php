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

//un listado de los álbumes con el número de fotos que contiene cada
//álbum y el número total de fotos que tiene el usuario. Para confirmar la solicitud de baja el usuario debe introducir su contraseña actual.

$sentencia = "SELECT IdUsuario from Usuarios where NomUsuario='{$_SESSION['nombre']}'";
$usu = $mysqli->query($sentencia);

$idusu = $usu->fetch_assoc();
$id = $idusu['IdUsuario'];

$sentencia2 = "SELECT * from Albumes where Usuario='{$id}'";
$alb = $mysqli->query($sentencia2);



echo<<<EOF
  <h2>Darse de baja</h2>
  <h3> ¿Desea eliminar definitivamente esta cuenta? </h3>
  <section id='album'>
    <ul>
EOF;

$total=0;

while($fila = $alb->fetch_assoc()){
  $sentencia2 = "SELECT COUNT(Titulo) FROM `fotos` WHERE Album='{$fila['IdAlbum']}'";
  $fotos = $mysqli->query($sentencia2);
  $fot = $fotos->fetch_assoc();
  $num = $fot['COUNT(Titulo)'];
  $total = $total + $num;
  echo "<li>{$fila['Titulo']}, {$fila['Descripcion']}, {$fot['COUNT(Titulo)']} fotos.</li>";
}

echo<<<EOF
    </ul>
    <p>Número de fotos totales: $total.</p>
    </section>

    <form action="confirmacionbaja.php" method="post">
        <p>Confirme su contraseña</p>
        <input type="password" name="pass" placeholder="Contraseña" required><br>
        <input id="botoni" type="submit" name="submit" value="Eliminar cuenta"><br/>
    </form>
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
