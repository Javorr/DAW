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


    $sentencia = "SELECT * from Estilos";
    $estilos = $mysqli->query($sentencia);
    //if(!$estilos || $mysqli->errno) echo "<p>mal asunto</p>";


echo<<<EOF
    <h2> Configuración </h2>
    <h3> Selecciona uno de los estilos disponibles </h3>

    <section>
      <form action="usuario.php" method="get">
          <label for="selest">Estilos disponibles:</label><br>

          <select id="selest" name="est">
EOF;

          while($fila = $estilos->fetch_assoc()){
            echo "<option value='{$fila['IdEstilo']}'>{$fila['Nombre']}</option>";
          }

echo<<<EOF
    </select>
    <input type="submit" name="submit" value="Confirmar"><br />

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
