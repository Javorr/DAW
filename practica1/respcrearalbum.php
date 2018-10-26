<!-- Página “Respuesta crear álbum”
    Muestra los datos necesarios para crear un álbum (título y descripción). -->

    <?php
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/ensesion.php");


echo<<<EOF
    <p>Has creado el álbum {$_POST["titulo"]} con descripción {$_POST["descripcion"]} de manera exitosa.</p>
EOF;


     $volver="index.php";
    require_once("requires/pie.php"); ?>
