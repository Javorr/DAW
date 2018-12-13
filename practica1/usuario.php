<!--  Página menú usuario registrado
    Contiene enlaces con las funciones que puede realizar un usuario registrado:
    modificar sus datos, darse de baja, visualizar sus álbumes, crear un álbum nuevo y solicitar un álbum impreso. -->

    <?php
    session_start();

    if(isset($_COOKIE['last_visit'])) {
      $current_visit = date("c");
      setcookie("last_visit", $current_visit, (time()+60*60*24*90), $secure = true);
    }

    if (isset($_COOKIE['nombre']) and  isset($_COOKIE['cont'])) {
       if($_COOKIE['nombre'] == $_COOKIE['cont']){
      $_SESSION['nombre'] = $_COOKIE['nombre'];
      $_SESSION['estilo'] = $_COOKIE['estilo'];
      }
    }
    if(isset($_SESSION['nombre'])) {
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/barrabusqueda.php");

    require("requires/mysqli.php");

    $sentencia = "SELECT Foto from Usuarios where NomUsuario='{$_SESSION['nombre']}'";
    $fichero = $mysqli->query($sentencia);
    $fotillo = $fichero->fetch_assoc();

echo<<<EOF
<h3>¡Hola {$_SESSION['nombre']}!</h3>

    <section id="perfil">
    <figure>
      <img src='http://localhost/files/perfil/{$fotillo['Foto']}' alt="Foto del usuario" style="width:15%">
    </figure>

    <div>
      <a href="cerrarsesion.php">Cerrar sesión</a>
    </div>

    <ul class="perfilusu">
      <li> <a href="configurar.php"> <span>Configuración estilo</span> </a> </li>
      <li> <a href="modificardatos.php"> <span>Modificar datos</span> </a> </li>
      <li> <a href="baja.php"> <span>Darse de baja</span> </a> </li>
    </ul>

    <ul class="perfilusu">
      <li> <a href="misalbumes.php"> <span>Mis álbumes</span> </a> </li>
      <li> <a href="crearalbum.php"> <span>Crear nuevo álbum</span> </a> </li>
      <li> <a href="anadirfoto.php"> <span>Añadir foto a álbum</span> </a> </li>
      <li> <a href="solicitaralbum.php"> <span>Solicitar álbum impreso</span> </a> </li>
    </ul>

    </section>
EOF;

         $volver="index.php";
        require_once("requires/pie.php");
        mysqli_close($mysqli);
      }
      else{
        $host = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'index.php';
        header("Location: http://$host$uri/$extra");
        exit;
      }
?>
