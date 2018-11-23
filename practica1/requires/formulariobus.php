<?php

$connection = new mysqli("localhost", "root", "root", "pibd");

  if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
  }
  else {

    $sql = "SELECT * FROM paises";
    $consulta = $connection->query($sql);
    $fechahoy = date("Y-m-d");

echo<<<EOF
<section>
  <form action="resultadobusqueda.php" method="get">
  <h2>Filtros de búsqueda</h2>

      <label for="tituloBus">Título</label><br>
      <input id="tituloBus" name="titulo" type="text"><br>

      <label for="fechaBusIni">Fecha entre </label><br>
      <input id="fechaBusIni" name="fechai" type="date" value="1990-01-01"> y <input id="fechaBusFin" name="fechaf" type="date" value="$fechahoy"><br>

      <label for="limpiarPaisBus">Pais</label><br>

      <select id="limpiarPaisBus" name="pais">

EOF;

if ($consulta->num_rows > 0) {
  while ($fila = $consulta->fetch_assoc()) {

echo<<<EOF
<option value="{$fila["IdPais"]}">{$fila["NomPais"]}</option>
EOF;

  }
}

echo<<<EOF
    <option value="0"> </option>
      </select>

      <input type="submit" name="submit" value="Buscar"><br />

  </form>
</section>
EOF;
mysqli_close($connection);
}

 ?>
