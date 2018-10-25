<!-- Respuesta “Solicitar álbum”
    Muestra una confirmación de que se ha registrado la solicitud de un álbum y también muestra el coste del álbum. -->

    <?php
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/ensesion.php");
     ?>

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
        if($pag>=5 & $pag<=10) $dineros = $pag * 0.08;
        if($pag>=11) $dineros = $pag * 0.07;

        if($imp == "Color") $dineros=$dineros+($fotos * 0.05);
        if($reso != "150" && $reso != "300" && $reso != "---") $dineros=$dineros+($fotos * 0.02);


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
        <?php $volver="index.php";
        require_once("requires/pie.php"); ?>
