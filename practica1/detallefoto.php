<!--  Página detalle foto
  Muestra toda la información sobre una foto seleccionada en la página anterior (foto, título, fecha, país, álbum de fotos y usuario al que pertenece)-->

<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Javier Martinez y Monica Ramperez" />
    <meta name="description" content="Pagina web de fotografia" />

    <link rel="stylesheet" type="text/css" href="estilos.css" title="Default Style"/>
    <link rel="alternate stylesheet" type="text/css" href="ua.css" title="UA Style"/>
    <link rel="stylesheet" type="text/css" href="impresion.css" media="print"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <title>Imagehony</title>
  </head>

  <body>

    <header>
        <a id="arriba" href="index.html"><img src='logo.png' alt="Logotipo" width="300"></a>
        <h2>Tu web de fotografía</h2>
    </header>

    <section id="barrabus">
      <form action="resultadobusqueda.html" id="busquedarapida1">
        <a href="busqueda.html">Búsqueda: </a>
        <input id="busquedarapida" name="busqueda" type="search" placeholder="Búsqueda"><br>
      </form>
    </section>

    <section>

        <div class="desplegable">
            <span>@usuario</span>
            <div  id="sesioniniciada">
            <figure>
              <a href="usuario.php"><img src='icon.svg' alt="Foto del usuario" style="width:80%"></a>
            </figure>
            <a href="usuario.php"><h2>@usuario</h2></a>
            <a href="usuario.php">Ver perfil</a><br>
            <a href="index.html">Cerrar sesión</a>
          </div>
        </div>

        <div  id="sesioniniciada">
        <figure>
          <a href="usuario.php"><img src='icon.svg' alt="Foto del usuario" style="width:80%"></a>
        </figure>
        <a href="usuario.php"><h2>@usuario</h2></a>
        <a href="usuario.php">Ver perfil</a><br>
        <a href="index.html">Cerrar sesión</a>
      </div>
    </section>

      <?php
        $id = $_GET['id'];

        //Foto para los id pares
        if($id%2 == 0){
          $nombre = 'Foto par';
          $fecha = "'2018-09'>Septiembre 2018";
          $pais = 'España';
          $album = "<a href='#albumpar'> <span>Álbum Par</span> </a>";
          $usuario = "<a href='#usuariopar'> <span>Usuario Par</span> </a>";
          $foto = "foto1.jpg";
        }
        //Foto para los id impares
        else {
          $nombre = 'Foto impar';
          $fecha = "'2018-10'>Octubre 2018";
          $pais = 'Alemania';
          $album = "<a href='#albumimpar'> <span>Álbum Impar</span> </a>";
          $usuario = "<a href='#usuarioimpar'> <span>Usuario Impar</span> </a>";
          $foto = "foto2.jpg";
        }

        echo "<h1>Detalles de la foto</h1>

        <figure id='fotoendetalle'>
          <img src='".$foto."' alt='Fotografía' style='width:100%'>
          <figcaption>".$nombre."</figcaption>

          <ul>
            <li><time datetime=".$fecha."</time></li>
            <li>".$pais."</li>
            <li> Perteneciente al álbum ".$album." del usuario ".$usuario."</li>
          </ul>
        </figure>"
      ?>

    <!-- En el pie de página incluye los nombres de los autores de la práctica, un aviso de copyright con el año y alguna información más. -->
    <footer>
      <a href="#arriba">Volver a index</a><br>
      <a href="accesibilidad.html">Declaración de accesibilidad</a>
        <p>&copy;<time datetime="2018-09"> Septiembre 2018</time></p>

        <p>
          <a href="http://jigsaw.w3.org/css-validator/check/referer">
              <img style="border:0;width:88px;height:31px"
                  src="http://jigsaw.w3.org/css-validator/images/vcss"
                  alt="¡CSS Válido!" />
          </a>
        </p>

        <p>Javier Martínez y Mónica Rampérez</p>
    </footer>

  </body>

</html>
