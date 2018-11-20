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

$sentencia = "SELECT * from Usuarios where NomUsuario='{$_SESSION['nombre']}'";
$usuario = $mysqli->query($sentencia);
if(!$usuario || $mysqli->errno) echo "<p>mal asunto</p>";
//else echo "<p>lo tenemo</p>";

$fila = $usuario->fetch_assoc();
  echo "<p>Nombre: {$fila['NomUsuario']} y Ciudad: {$fila['Ciudad']}</p>";

echo<<<EOF
    <h2> Modificar datos </h2>

    <section>
        <form action="usuario.php" id="registro" method="POST">
            <h2>Tus datos</h2>
            <label for="rnombre">Nombre usuario: </label><br><input id="rnombre" type="text" name="nombre" placeholder="Nombre" required><br>
            <label for="rpassword">Contraseña: </label><br><input id="rpassword" type="password" name="password" placeholder="Contraseña" required><br>
            <label for="rpassword2">Repetir contraseña: </label><br><input id="rpassword2" type="password" name="password2" placeholder="Constraseña" required><br>
            <label for="remail">Email: </label><br><input id="remail" type="email" name="email" placeholder="Email" required><br>
            <label for="rfecha">Fecha de nacimiento: </label><br><input id="rfecha" type="date" name="fecha"  required><br> <!-- warning puesto que date no lo soportan todos los navegadores-->
            <label for="rciudad">Ciudad: </label><br><input id="rciudad" type="text" name="ciudad" placeholder="Ciudad" required><br>
            <label for="rpais">País de residencia: </label><br><input id="rpais" type="text" name="pais" placeholder="País" required><br>
            <label>Género:</label><br><input id="mgenero" type="radio" name="genero" value="Mujer" checked><label for="mgenero">Mujer</label> <input id="hgenero" type="radio" name="genero" value="Hombre"><label for="hgenero">Hombre</label> <input id="ogenero" type="radio" name="genero" value="Otro"> <label for="ogenero">Otro</label><br><br>
            <label for="rfoto">Foto: </label><br><input id="rfoto" type="file" name="foto" required><br>
            <input type="submit" name="submit" value="Registrarse"><br />
        </form>
    </section>

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
