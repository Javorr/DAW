<!-- Respuesta “Solicitar álbum”
    Muestra una confirmación de que se ha registrado la solicitud de un álbum y también muestra el coste del álbum. -->

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

        <section>

            <div class="desplegable">
                <span>@usuario</span>
                <div  id="sesioniniciada">
                <figure>
                  <a href="usuario.html"><img src='icon.svg' alt="Foto del usuario" style="width:40%"></a>
                </figure>
                <a href="usuario.html"><h2>@usuario</h2></a>
                <a href="usuario.html">Ver perfil</a><br>
                <a href="index.html">Cerrar sesión</a>
              </div>
            </div>

            <div  id="sesioniniciada">
            <figure>
              <a href="usuario.html"><img src='icon.svg' alt="Foto del usuario" style="width:80%"></a>
            </figure>
            <a href="usuario.html"><h2>@usuario</h2></a>
            <a href="usuario.html">Ver perfil</a><br>
            <a href="index.html">Cerrar sesión</a>
          </div>

        </section>

        <?php

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $cp = $_POST['cp'];
        $localidad = $_POST['localidad'];
        $provincia = $_POST['provincia'];
        $pais = $_POST['pais'];
        $fecha = $_POST['fecha'];
        $titulo = $_POST['titulo'];
        $textoadicional = $_POST['textoadicional'];
        $reso = $_POST['reso'];
        $copias = $_POST['copias'];
        $alb = $_POST['alb'];
        $imp = $_POST['imp'];

        $pag=10;
        $fotos = 10;

        if($pag<5) $dineros = $pag * 0.1;
        if($pag>=5 & $copias<=10) $dineros = $pag * 0.08;
        if($pag>=11) $dineros = $pag * 0.07;


        echo "

            <section >
                  <h2>Confirmación del pedido</h2>
                  <p>El pedido con los siguientes datos ha sido procesado.</p>
                  <ul id='album'>
                      <li>Nombre: ".$nombre." </li>
                      <li>Título del álbum: ".$titulo." </li>
                      <li>Texto adicional: ".$textoadicional."</li>
                      <li>Email: ".$email."</li>
                      <li>Dirección: ".$direccion." </li>
                      <li>Código postal: ".$cp." </li>
                      <li>Localidad: ".$localidad." </li>
                      <li>Provincia: ".$provincia." </li>
                      <li>País: ".$pais."</li>
                      <li>Número de copias: ".$copias."</li>
                      <li>Fecha: ".$fecha." </li>
                      <li>Resolución: ".$reso." </li>
                      <li>Álbum: ".$alb."</li>
                      <li>Impresión: ".$imp." </li>
                      <li>Coste: ".$dineros."</li>
                  </ul>
                </section>

                ";


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
