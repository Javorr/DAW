
<!--  Página principal
    Contiene enlaces a las distintas páginas que componen el sitio web,
    un formulario (nombre de usuario y contraseña) para acceder como usuario registrado
    y un listado con un resumen (foto, título, fecha, país) de las últimas cinco fotos que se han introducido. -->

<?php
require_once("/requires/cabecera.php");
require_once("/requires/inicio.php");
require_once("/requires/barrabusqueda.php");
require_once("/requires/sinsesion.php");
 ?>


    <h2>Últimas fotografías</h2>

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
    <?php require_once("/requires/pie.php"); ?>
