<!--  Página con el formulario de registro como nuevo usuario
    Contiene un formulario con los datos necesarios para registrarse
    (nombre de usuario, contraseña, repetir contraseña, dirección de email, sexo, fecha de nacimiento, ciudad y país de residencia, foto).  -->

    <?php
    session_start();

  if(!(isset($_SESSION['nombre']))) {
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/sinsesion.php");

    require("requires/mysqli.php");
    if($mysqli -> connect_errno) echo "<p>mal asunto</p>";

    $sentencia = "SELECT * from Paises";
    $paises = $mysqli->query($sentencia);

    echo "<h2> Registro </h2>
    <section>
    <form action='respregistro.php' id='registro' method='POST' enctype='multipart/form-data'>";

    require_once("requires/fregistro.php");
    echo"<input type='submit' name='submit' value='Registro'><br /></form></section>";

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
