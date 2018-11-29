<!-- Página “Respuesta crear álbum”
    Muestra los datos necesarios para crear un álbum (título y descripción). -->

    <?php
    session_start();

    if(isset($_COOKIE['last_visit'])) {
      $current_visit = date("c");
      setcookie("last_visit", $current_visit, (time()+60*60*24*90), $secure = true);
    }

    if(isset($_SESSION['nombre'])){
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/ensesion.php");
    require("requires/mysqli.php");

    $sentencia = "SELECT * from Usuarios where NomUsuario='{$_SESSION['nombre']}'";
    $usuario = $mysqli->query($sentencia);
    $idusu = $usuario->fetch_assoc();
    $id = $idusu['IdUsuario'];

    $sql = "INSERT INTO `albumes` (`Titulo`, `Descripcion`, `Usuario`) VALUES ('{$_POST['titulo']}', '{$_POST['descripcion']}', '$id')";
    $consulta = $mysqli->query($sql);

    $sentencia = "SELECT * from Albumes where Titulo='{$_POST['titulo']}'";
    $album = $mysqli->query($sentencia);
    $idalb = $album->fetch_assoc();
    $ida = $idalb['IdAlbum'];

echo<<<EOF
    <p>Has creado el álbum "{$_POST["titulo"]}" con descripción "{$_POST["descripcion"]}" de manera exitosa.</p>
    <p>Empieza a <a href="anadirfoto.php?alb=$ida">añadir fotos</a>.</p>
EOF;


     $volver="index.php";
    require_once("requires/pie.php");
  }
  else {
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
  }
    ?>
