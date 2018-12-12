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
$hayalbumes = false;

$sentencia = "SELECT * from Albumes, Usuarios where Usuarios.NomUsuario = '{$_SESSION['nombre']}' and Albumes.IdAlbum = {$_POST['alb']}";
$albumes = $mysqli->query($sentencia);
if(!$albumes || $mysqli->errno) echo "<p>mal asunto</p>";

$nomalbum = $albumes->fetch_assoc();
if($albumes->num_rows > 0) $hayalbumes = true;

$sentencia = "SELECT * from Paises where Paises.IdPais = {$_POST['pa']}";
$paises = $mysqli->query($sentencia);
if(!$paises || $mysqli->errno) echo "<p>mal asunto</p>";

$nompais = $paises->fetch_assoc();

if($hayalbumes) {

  if ($_FILES['foto']['size'] > 0 && $_FILES['foto']['error'] == 0) { //si hay una imagen y no hay un error entonces se subira la foto

    $formato = explode("/", $_FILES["foto"]["type"]);

    $nomfile = $_FILES['foto']['name'];
    $nomalbum = $_POST['alb'];

    $defi = $nomfile."_".$rnombre."_".$nomalbum.".".$formato[1];
    //echo $defi;

    $numarchivos = 0;
    $archivos = glob($defi . "*");
    if ($archivos){
     $numarchivos = count($archivos);
    }

    for ($i=0; $i < $numarchivos; $i++) {

      if(file_exists("D:\\xampp\\htdocs\\files\\fotos\\".$defi)) { //si existe un file con ese nombre en el directorio entonces se le asignara un numero, se comprobara si el nombre nuevo existe y si no existe se movera al directorio
        $defi = $defi.$i; //se concatena la i SE VA INCREMENTANDO EN PLAN yo1234.jpg
      }
      else { //si no existe ese file aun entonces se movera ha dicho directorio con ese nombre
        move_uploaded_file($_FILES["foto"]["tmp_name"],
           "D:\\xampp\\htdocs\\files\\fotos\\".$defi);
           //echo "Almacenado en: " . "D:\\xampp\\htdocs\\files\\fotos\\".$defi;
      }
    }

    $ruta = "http://localhost/files/fotos/".$defi;
    //echo "ruta " . $ruta;

  }

  $fregistro = date('Y-m-d H:i:s');
  $sql = "INSERT INTO `fotos` (`Titulo`, `Descripcion`, `Fecha`, `Pais`, `Album`, `Fichero`, `Alternativo`, `FRegistro`) VALUES ('{$_POST['Titulo']}', '{$_POST['fdescripcion']}', '{$_POST['fecha']}', '{$_POST['pa']}', '{$_POST['alb']}', '$defi', '{$_POST['textalt']}', '$fregistro')";
  $consulta = $mysqli->query($sql);

echo<<<EOF
  <section>
      <h2>Fotografía subida</h2>
      <p>Se ha subido la siguiente imagen:</p>
      <ul id='album'>
          <li>Título: {$_POST['Titulo']} </li>
          <li>Descripción: {$_POST['fdescripcion']} </li>
          <li>Fecha: {$_POST['fecha']}</li>
          <li>País: {$nompais['NomPais']}</li>
          <li>Álbum: {$nomalbum['Titulo']} </li>
          <li>Fichero:  {$_POST['foto']} </li>
          <li>Texto alternativo: {$_POST['textalt']} </li>
      </ul>
    </section>

    <figure>
      <img src='$ruta' alt="Foto de álbum" style="width:15%">
    </figure>
EOF;

}
else {
  echo "<p>Álbum no disponible.</p>";
}


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
