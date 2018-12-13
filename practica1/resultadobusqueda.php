<!--  Página con el listado resultado de una búsqueda
    Contiene un listado con un resumen (foto, título, fecha y país) de las fotos que cumplen los criterios de una búsqueda. -->

    <?php
    session_start();

    if(isset($_COOKIE['last_visit'])) {
      $current_visit = date("c");
      setcookie("last_visit", $current_visit, (time()+60*60*24*90), $secure = true);
    }

    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/sinsesion.php");
    require_once("requires/formulariobus.php");
     ?>

    <h2>Resultado</h2>

    <?php

      error_reporting(0);
      $titulo = $_GET['titulo'];
      $fechai = $_GET['fechai'];
      $fechaf = $_GET['fechaf'];
      $pais = $_GET['pais'];

      if(isset($_GET['titulo']) && !(isset($_GET['fechai'])) && !(isset($_GET['fechaf'])) && !(isset($_GET['pais']))) {


        require("requires/mysqli.php");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        else {


echo<<<EOF
      <p>Resultados para fotos con título "$titulo".</p>
EOF;

     $sql2 = "SELECT * FROM fotos where fotos.Titulo like '%{$titulo}%' order by fotos.FRegistro";
     $consulta2 = $mysqli->query($sql2);

     if ($consulta2->num_rows > 0) {
       echo '<section class="columnas">';

      while($fila2 = $consulta2->fetch_assoc()) {

        $sql = "SELECT * FROM paises where paises.IdPais = {$fila2["Pais"]}";
        $consulta = $mysqli->query($sql);
        $fila = $consulta->fetch_assoc();

echo<<<EOF

       <article>
           <h3 title="{$fila2["Titulo"]}"><a href="detallefoto.php?id={$fila2["IdFoto"]}">{$fila2["Titulo"]}</a></h3>
           <a href="detallefoto.php?id={$fila2["IdFoto"]}"><img class="fotos" src='http://localhost/files/fotos/{$fila2["Fichero"]}' alt="{$fila2["Alternativo"]}" width="400"></a>

            <ul>
              <li><time datetime="2018-09">{$fila2["FRegistro"]}</time></li>
              <li>{$fila["NomPais"]}</li>
            </ul>
       </article>

EOF;
      }
  echo "</section>";
    }
    else {
  echo "<p>No se encontraron resultados para la búsqueda.</p>";
    }
    mysqli_close($mysqli);
  }


      }
      else {
        require("requires/mysqli.php");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        else {

        $sql = "SELECT * FROM paises";
        $consulta = $mysqli->query($sql);


        if ($consulta->num_rows > 0) {
          while ($fila = $consulta->fetch_assoc()) {

            if($pais == "0") {
              $sql2 = "SELECT * FROM fotos where fotos.Titulo like '%{$titulo}%' and (fotos.Fecha BETWEEN '$fechai' AND '$fechaf') order by fotos.FRegistro";
            }


            if($pais == "{$fila["IdPais"]}"){
              $paisl = "{$fila["NomPais"]}";
              $pais = "{$fila["IdPais"]}";
              $sql2 = "SELECT * FROM fotos where fotos.Titulo like '%{$titulo}%' and (fotos.Fecha BETWEEN '$fechai' AND '$fechaf') and fotos.Pais=$pais order by fotos.FRegistro";

            }

          }
        }

echo<<<EOF
      <p>Resultados para fotos con título "$titulo" entre las fechas $fechai y $fechaf del país $paisl.</p>
EOF;

    $consulta2 = $mysqli->query($sql2);

     if ($consulta2->num_rows > 0) {
  echo '<section class="columnas">';

      while($fila2 = $consulta2->fetch_assoc()) {

echo<<<EOF

       <article>
           <h3 title="{$fila2["Titulo"]}"><a href="detallefoto.php?id={$fila2["IdFoto"]}">{$fila2["Titulo"]}</a></h3>
           <a href="detallefoto.php?id={$fila2["IdFoto"]}"><img class="fotos" src="{$fila2["Fichero"]}" alt="{$fila2["Alternativo"]}" width="400"></a>

            <ul>
              <li><time datetime="2018-09">{$fila2["FRegistro"]}</time></li>
              <li>$paisl</li>
            </ul>
       </article>

EOF;
      }
  echo "</section>";
    }
    else {
  echo "<p>No se encontraron resultados para la búsqueda.</p>";
    }

  }
  mysqli_close($mysqli);
}





     $volver="index.php";
    require_once("requires/pie.php"); ?>
