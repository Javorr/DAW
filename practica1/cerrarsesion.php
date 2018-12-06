<html>
 <?php
session_start();
session_destroy();

if(isset($_GET['del'])){
  if(isset($_COOKIE['nombre'])) {
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'borracookie.php?del=1';
    header("Location: http://$host$uri/$extra");
    exit;
  }
  else {
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php?del=1';
    header("Location: http://$host$uri/$extra");
    exit;
  }
}

else
{if(isset($_COOKIE['nombre'])) {
  $host = $_SERVER['HTTP_HOST'];
  $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'borracookie.php';
  header("Location: http://$host$uri/$extra");
  exit;
}
else {
  $host = $_SERVER['HTTP_HOST'];
  $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'index.php';
  header("Location: http://$host$uri/$extra");
  exit;
}}
 ?>
 </html>
