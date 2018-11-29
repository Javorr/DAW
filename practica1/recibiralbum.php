<!-- Respuesta “Solicitar álbum”
    Muestra una confirmación de que se ha registrado la solicitud de un álbum y también muestra el coste del álbum. -->

    <?php
    session_start();

    if(isset($_COOKIE['last_visit'])) {
      $current_visit = date("c");
      setcookie("last_visit", $current_visit, (time()+60*60*24*90), $secure = true);
    }

    if(isset($_POST['nombre'])){
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/ensesion.php");
    require("requires/mysqli.php");


        $reso = $_POST['reso'];
        $imp = $_POST['imp'];

        $pag=10;
        $fotos = 10;

        if($pag<5) $dineros = $pag * 0.1;
        if($pag>=5 & $pag<=10) $dineros = $pag * 0.08;
        if($pag>=11) $dineros = $pag * 0.07;

        if($imp == "Color") $dineros=$dineros+($fotos * 0.05);
        if($reso != "150" && $reso != "300" && $reso != "---") $dineros=$dineros+($fotos * 0.02);



$sql = "INSERT INTO `solicitudes` (`Album`, `Nombre`, `Titulo`, `Descripcion`, `Email`, `Direccion`, `Color`, `Copias`, `Resolucion`, `Fecha`, `IColor`, `FRegistro`, `Coste`) VALUES ('{$_POST['alb']}', '{$_POST['nombre']}', '{$_POST['titulo']}', '{$_POST['textoadicional']}', '{$_POST['email']}', '{$_POST['direccion']}', '#0431B4', '{$_POST['copias']}', '$reso', '2018-03-02', '$imp', '2018-05-03 11:20:17', '$dineros')";
$consulta = $mysqli->query($sql);

echo<<<EOF

            <section >
                  <h2>Confirmación del pedido</h2>
                  <p>El pedido con los siguientes datos ha sido procesado.</p>
                  <ul id='album'>
                      <li>Nombre: {$_POST['nombre']} </li>
                      <li>Título del álbum: {$_POST['titulo']} </li>
                      <li>Texto adicional: {$_POST['textoadicional']}</li>
                      <li>Email: {$_POST['email']}</li>
                      <li>Dirección: {$_POST['direccion']} </li>
                      <li>Código postal: {$_POST['cp']} </li>
                      <li>Localidad: {$_POST['localidad']} </li>
                      <li>Provincia: {$_POST['provincia']} </li>
                      <li>País: {$_POST['pais']}</li>
                      <li>Número de copias: {$_POST['copias']}</li>
                      <li>Fecha: {$_POST['fecha']} </li>
                      <li>Resolución: $reso </li>
                      <li>Álbum: {$_POST['alb']}</li>
                      <li>Impresión: $imp </li>
                      <li>Coste: $dineros €</li>
                  </ul>
                </section>

EOF;

         $volver="index.php";
        require_once("requires/pie.php");
      }

        else{
          $host = $_SERVER['HTTP_HOST'];
          $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
          $extra = 'index.php';
          header("Location: http://$host$uri/$extra");
          exit;
        }

        ?>
