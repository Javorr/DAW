<html>
<?php
session_start();
if(isset($_SESSION['nombre'])){

  require("requires/mysqli.php");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    else {
      $sql = "SELECT Clave FROM usuarios where NomUsuario='{$_SESSION['nombre']}'";
      $consulta = $mysqli->query($sql);

      $fila = $consulta->fetch_assoc();

      if($fila['Clave']==$_POST['pass']){
        $sql = "DELETE FROM `usuarios` WHERE NomUsuario = '{$_SESSION['nombre']}'";
        $consulta = $mysqli->query($sql);
        $host = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'cerrarsesion.php';
        header("Location: http://$host$uri/$extra");
        exit;
      }
    mysqli_close($mysqli);
  }
}

else{
  $host = $_SERVER['HTTP_HOST'];
  $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'cerrarsesion.php';
  header("Location: http://$host$uri/$extra");
  exit;
}

?>
</html>
