<!--  Página con el listado resultado de una búsqueda
    Contiene un listado con un resumen (foto, título, fecha y país) de las fotos que cumplen los criterios de una búsqueda. -->

    <?php
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/sinsesion.php");
     ?>

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

      error_reporting(0);
      $titulo = $_GET['titulo']; if($titulo=='') $titulo = '---';
      $fechai = $_GET['fechai']; if($fechai=='') $fechai = '---';
      $fechaf = $_GET['fechaf']; if($fechaf=='') $fechaf = '---';

      $pais = $_GET['pais'];
      if($pais == '---') $paisl = '---';
      if($pais == 'spa') $paisl = 'España';
      if($pais == 'fr') $paisl = 'Francia';
      if($pais == 'pt') $paisl = 'Portugal';

      echo "<p>Resultados para fotos con título: ".$titulo." entre ".$fechai." y ".$fechaf." de ".$paisl."</>";

      require_once("requires/fotos.php");
    ?>

    <!-- En el pie de página incluye los nombres de los autores de la práctica, un aviso de copyright con el año y alguna información más. -->
    <?php $volver="index.php";
    require_once("requires/pie.php"); ?>
