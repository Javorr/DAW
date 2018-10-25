<!-- Página “Respuesta crear álbum”
    Muestra los datos necesarios para crear un álbum (título y descripción). -->

    <?php
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/ensesion.php");
     ?>

    <?php
    $titulo=$_POST["titulo"];
    $descripcion=$_POST["descripcion"];
    echo "<p>Has creado el álbum ".$titulo." con descripción ".$descripcion." de manera exitosa.</p>";
    ?>

    <!-- En el pie de página incluye los nombres de los autores de la práctica, un aviso de copyright con el año y alguna información más. -->
    <?php $volver="index.php";
    require_once("requires/pie.php"); ?>
