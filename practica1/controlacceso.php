<html>
 <?php

$nombre = $_GET['nombre'];
$password = $_GET['password'];

if(($nombre=='usuario1' and $password=='usuario1') or ($nombre=='usuario2' and $password=='usuario2')
    or ($nombre=='usuario3' and $password=='usuario3') or ($nombre=='usuario4' and $password=='usuario4')) header("Location: usuario.php");

else{

header("Location: index.php?error=true");
}


 ?>
</html>
