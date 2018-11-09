<!-- Página “Crear álbum”
    Contiene un formulario con los datos necesarios para crear un álbum (título y descripción). -->

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
     ?>

      <section>

        <form action="respcrearalbum.php" method="POST">
            <h2>Creación de álbum</h2>
              <label for="ctitulo">Título: </label><input id="ctitulo" type="text" name="titulo" placeholder="Título" maxlength="200" required><br>
              <label for="cdescripcion">Descripción: </label><input id="cdescripcion" type="text" name="descripcion" placeholder="Descripción" maxlength="200" required><br> <br>

            <input type="submit" name="submit" value="Enviar"><br>
        </form>

    </section>

    <!-- En el pie de página incluye los nombres de los autores de la práctica, un aviso de copyright con el año y alguna información más. -->
    <?php $volver="index.php";
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
