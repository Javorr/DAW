<?php

$connection = new mysqli("localhost", "root", "root", "pibd");

  if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
  }
  else {

    $sql = "SELECT * FROM paises";
    $consulta = $connection->query($sql);

echo<<<EOF
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
EOF;

if ($consulta->num_rows > 0) {
  while ($fila = $consulta->fetch_assoc()) {

echo<<<EOF
<option value="{$fila["IdPais"]}">{$fila["NomPais"]}</option>
EOF;

  }
}

echo<<<EOF
      </select>

      <input type="submit" name="submit" value="Buscar"><br />

  </form>
</section>
EOF;
}

 ?>
