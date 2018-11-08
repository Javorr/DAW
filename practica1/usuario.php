<!--  Página menú usuario registrado
    Contiene enlaces con las funciones que puede realizar un usuario registrado:
    modificar sus datos, darse de baja, visualizar sus álbumes, crear un álbum nuevo y solicitar un álbum impreso. -->

    <?php
    session_start();
    if (isset($_COOKIE['nombre'])) {
      $_SESSION['nombre'] = $_COOKIE['nombre'];
    }
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/barrabusqueda.php");
    echo "<h3>Hola " .$_SESSION['nombre']. "</h3>";
     ?>

        <section id="perfil">
        <figure>
          <img src='images/icon.svg' alt="Foto del usuario" style="width:15%">
        </figure>

        <div>
          <a href="cerrarsesion.php">Cerrar sesión</a>
        </div>

        <ul class="perfilusu">
          <li> <a href="#modificar"> <span>Modificar datos</span> </a> </li>
          <li> <a href="#baja"> <span>Darse de baja</span> </a> </li>
        </ul>

        <ul class="perfilusu">
          <li> <a href="#misalbumes"> <span>Mis álbumes</span> </a> </li>
          <li> <a href="crearalbum.php"> <span>Crear nuevo</span> </a> </li>
          <li> <a href="solicitaralbum.php"> <span>Solicitar álbum impreso</span> </a> </li>
        </ul>

      </section>
        <!-- En el pie de página incluye los nombres de los autores de la práctica, un aviso de copyright con el año y alguna información más. -->
        <?php $volver="index.php";
        require_once("requires/pie.php"); ?>
