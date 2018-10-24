<!--  Página con el listado resultado de una búsqueda
    Contiene un listado con un resumen (foto, título, fecha y país) de las fotos que cumplen los criterios de una búsqueda. -->

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
          <span>Iniciar sesión / Registro</span>

          <form action="usuario.html" id="inicio">
              <h2 id="ti">Iniciar sesión</h2>
              <input id="fnombre" type="text" placeholder="Nombre" required><br>
              <input id="fpassword" type="password" name="password" placeholder="Contraseña" required><br>
              <input id="botoni" type="submit" name="submit" value="Iniciar sesión"><br/>
              <a id="linkre" href="Registro.html">¿No tienes cuenta? ¡Regístrate!</a>
          </form>
        </div>

        <form action="usuario.html" id="inicio">
            <h2 id="ti">Iniciar sesión</h2>
            <input id="fnombre" type="text" placeholder="Nombre" required><br>
            <input id="fpassword" type="password" name="password" placeholder="Contraseña" required><br>
            <input id="botoni" type="submit" name="submit" value="Iniciar sesión"><br/>
            <a id="linkre" href="Registro.html">¿No tienes cuenta? ¡Regístrate!</a>
        </form>
    </section>

    <section>
      <form action="resultadobusqueda.php" method="get">
      <h2>Filtros de búsqueda</h2>

          <label for="tituloBus">Título</label><br>
          <input id="tituloBus" name="titulo" type="text"><br>

          <label for="fechaBusIni">Fecha entre </label><br>
          <input id="fechaBusIni" name="fechai" type="date"> y <input id="fechaBusFin" name="fechaf" type="date"><br> <!-- warning puesto que date no lo soportan todos los navegadores-->

          <label for="limpiarPaisBus">Pais</label><br>

          <select id="limpiarPaisBus" name="pais">
            <option value="---">------</option>
            <option value="spa">España</option>
            <option value="fr">Francia</option>
            <option value="pt">Portugal</option>
          </select>

          <input type="submit" name="submit" value="Buscar"><br />

      </form>
    </section>

    <h2>Resultado</h2>

    <?php

      $titulo = $_GET['titulo']; if($titulo=='') $titulo = '---';
      $fechai = $_GET['fechai']; if($fechai=='') $fechai = '---';
      $fechaf = $_GET['fechaf']; if($fechaf=='') $fechaf = '---';
      
      $pais = $_GET['pais'];
      if($pais == '---') $paisl = '---';
      if($pais == 'spa') $paisl = 'España';
      if($pais == 'fr') $paisl = 'Francia';
      if($pais == 'pt') $paisl = 'Portugal';

      echo "<p>Resultados para fotos con título: ".$titulo." entre ".$fechai." y ".$fechaf." de ".$paisl."</>";
    ?>

    <section class="columnas">

               <article>
                   <h3 title="Fotografia 1"><a href="detallefoto.php?id=1">Fotografía 1</a></h3>
                   <a href="detallefoto.php?id=1"><img class="fotos" src='foto.jpg' alt="Fotografía" width="400"></a>

                    <ul>
                      <li><time datetime="2018-09">Septiembre 2018</time></li>
                      <li>España</li>
                    </ul>
               </article>

               <article>
                   <h3 title="Fotografia 2"><a href="detallefoto.php?id=2">Fotografía 2</a></h3>
                   <a href="detallefoto.php?id=2"><img class="fotos" src='foto.jpg' alt="Fotografía" width="400"></a>

                    <ul>
                      <li><time datetime="2018-09">Septiembre 2018</time></li>
                      <li>España</li>
                    </ul>
               </article>

               <article>
                   <h3 title="Fotografia 3"><a href="detallefoto.php?id=3">Fotografía 3</a></h3>
                   <a href="detallefoto.php?id=3"><img class="fotos" src='foto.jpg' alt="Fotografía" width="400"></a>

                    <ul>
                      <li><time datetime="2018-09">Septiembre 2018</time></li>
                      <li>España</li>
                    </ul>
               </article>

               <article>
                   <h3 title="Fotografia 4"><a href="detallefoto.php?id=4">Fotografía 4</a></h3>
                   <a href="detallefoto.php?id=4"><img class="fotos" src='foto.jpg' alt="Fotografía" width="400"></a>

                    <ul>
                      <li><time datetime="2018-09">Septiembre 2018</time></li>
                      <li>España</li>
                    </ul>
               </article>

               <article>
                   <h3 title="Fotografia 5"><a href="detallefoto.php?id=5">Fotografía 5</a></h3>
                   <a href="detallefoto.php?id=5"><img class="fotos" src='foto.jpg' alt="Fotografía" width="400"></a>

                    <ul>
                      <li><time datetime="2018-09">Septiembre 2018</time></li>
                      <li>España</li>
                    </ul>
               </article>

    </section>

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
