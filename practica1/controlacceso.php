<html>
 <?php

$nombre = $_GET['nombre'];
$password = $_GET['password'];

$usuarios = array(
    "1" => "usuario1",
    "2" => "usuario2",
    "3" => "usuario3",
    "4" => "usuario4"
);
$constrasenas = array(
    "1" => "usuario1",
    "2" => "usuario2",
    "3" => "usuario3",
    "4" => "usuario4"
);

$correcto = 'false';

for ($i=0; $i <count($usuarios) ; $i++) {
  if($nombre==$usuarios[$i] and $password==$constrasenas[$i]) $correcto = 'true';
}

if($correcto=='true'){
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
