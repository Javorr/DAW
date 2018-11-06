<html>
 <?php
setcookie("nombre", "", time() - 3600);
setcookie("last_visit", "", time() - 3600);

$host = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';
header("Location: http://$host$uri/$extra");
exit;
 ?>
 </html>
