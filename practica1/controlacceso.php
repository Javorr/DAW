<html>
 <?php

$nombre = $_GET['nombre'];
$password = $_GET['password'];
$correcto = 'false';

$connection = new mysqli("localhost", "root", "root", "pibd");

  if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
  }
  else {
    $sql = "SELECT * FROM fotos order by fotos.FRegistro";
    $consulta = $connection->query($sql);

  if ($consulta->num_rows > 0) {

    while($fila = $consulta->fetch_assoc()) {

      if($nombre == "{$fila["NomUsuario"]}" && $password == "{$fila["Clave"]}") {
        $sql2 = "SELECT * FROM estilos where estilos.IdEstilo={$fila["Estilo"]}";
        $consulta2 = $connection->query($sql2);
        $fila2 = $consulta2->fetch_assoc();

        $correcto = 'true';
        $estilo = "{$fila2["Nombre"]}";
      }

    }
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
