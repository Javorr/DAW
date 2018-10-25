<!--  Página con el formulario de búsqueda
    Contiene un formulario para realizar una búsqueda de fotos con los siguientes criterios: título, fecha y país. -->

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


    <!-- En el pie de página incluye los nombres de los autores de la práctica, un aviso de copyright con el año y alguna información más. -->
    <?php $volver="index.php";
    require_once("requires/pie.php"); ?>
