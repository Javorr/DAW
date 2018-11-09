<html>
 <?php

$nombre = $_GET['nombre'];
$password = $_GET['password'];

$usuarios = array(
  "usuario1",
  "usuario2",
  "usuario3",
  "usuario4"
);

$contrasenas = array(
  "usuario1",
  "usuario2",
  "usuario3",
  "usuario4"
);

$estilos = array(
  "ua.css",
  "estilos.css",
  "ua.css",
  "estilos.css"
);

$correcto = 'false';

for ($i=0; $i <count($usuarios) ; $i++) {
  if($nombre==$usuarios[$i] and $password==$contrasenas[$i]) {
    $correcto = 'true';
    $estilo = $estilos[$i];
    $cont = $contrasenas[$i];
  }
}

//Si el usuario y la contrasena son correctos
if($correcto=='true'){
    session_start();
    $_SESSION['nombre']=$nombre;
    $_SESSION['estilo']=$estilo;

    //Si quiere que se le recuerde
    if(isset($_GET['recordar'])){
        $last_visit = isset($_COOKIE['last_visit']) ? $_COOKIE['last_visit'] : "Primera vez";
        $current_visit = date("c");
        setcookie("last_visit", $current_visit, (time()+60*60*24*90), $secure = true);

        setcookie("nombre", $nombre, (time()+60*60*24*90), $secure = true);

        setcookie("estilo", $estilo, (time()+60*60*24*90), $secure = true);

        setcookie("cont", $cont, (time()+60*60*24*90), $secure = true);
      }

      $host = $_SERVER['HTTP_HOST'];
      $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = 'usuario.php';
      header("Location: http://$host$uri/$extra");
      exit;
    }

    else{
      $host = $_SERVER['HTTP_HOST'];
      $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = 'index.php?error=401';
      header("Location: http://$host$uri/$extra");
      exit;
    }

 ?>
</html>
