<!--  Página detalle foto
  Muestra toda la información sobre una foto seleccionada en la página anterior (foto, título, fecha, país, álbum de fotos y usuario al que pertenece)-->

  <?php
  session_start();

  if(isset($_SESSION['nombre'])){
  require_once("requires/cabecera.php");
  require_once("requires/inicio.php");
  require_once("requires/barrabusqueda.php");
  require_once("requires/ensesion.php");

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        //Foto para los id pares
        if($id%2 == 0){
          $nombre = 'Foto par';
          $fecha = "'2018-09'>Septiembre 2018";
          $pais = 'España';
          $album = "<a href='#albumpar'> <span>Álbum Par</span> </a>";
          $usuario = "<a href='#usuariopar'> <span>Usuario Par</span> </a>";
          $foto = "images/foto1.jpg";
        }
        //Foto para los id impares
        else {
          $nombre = 'Foto impar';
          $fecha = "'2018-10'>Octubre 2018";
          $pais = 'Alemania';
          $album = "<a href='#albumimpar'> <span>Álbum Impar</span> </a>";
          $usuario = "<a href='#usuarioimpar'> <span>Usuario Impar</span> </a>";
          $foto = "images/foto2.jpg";
        }

echo<<<EOF

        <h1>Detalles de la foto</h1>

        <figure id='fotoendetalle'>
          <img src='$foto' alt='Fotografía' style='width:100%'>
          <figcaption>$nombre</figcaption>

          <ul>
            <li><time datetime=$fecha</time></li>
            <li>$pais</li>
            <li> Perteneciente al álbum $album del usuario $usuario</li>
          </ul>
        </figure>
EOF;
}
else{
  $host = $_SERVER['HTTP_HOST'];
  $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'index.php';
  header("Location: http://$host$uri/$extra");
  exit;
}

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
