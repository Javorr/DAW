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

$constrasenas = array(
    "usuario1",
    "usuario2",
    "usuario3",
    "usuario4"
);

$correcto = 'false';

for ($i=0; $i <count($usuarios) ; $i++) {
  if($nombre==$usuarios[$i] and $password==$constrasenas[$i]) $correcto = 'true';
}

//Si el usuario y la contrasena son correctos
if($correcto=='true'){
    session_start();
    $_SESSION['nombre']=$nombre;
    $last_visit = isset($_COOKIE['last_visit']) ? $_COOKIE['last_visit'] : "Primera vez";
    $current_visit = date("c");
    setcookie("last_visit", $current_visit, (time()+60*60*24*90));

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
