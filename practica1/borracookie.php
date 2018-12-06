<html>
 <?php
setcookie("nombre", "", time() - 3600);
setcookie("last_visit", "", time() - 3600);
setcookie("estilo", "", time() - 3600);
setcookie("cont", "", time() - 3600);

if(isset($_GET['del'])){
  $host = $_SERVER['HTTP_HOST'];
  $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'index.php?del=1';
  header("Location: http://$host$uri/$extra");
  exit;
}
else
{$host = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';
header("Location: http://$host$uri/$extra");
exit;}
 ?>
 </html>
