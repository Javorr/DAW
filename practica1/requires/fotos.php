<?php
$connection = new mysqli("localhost", "root", "root", "pibd");

  if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
  }
  else {
    $sql = "SELECT * FROM fotos order by fotos.FRegistro";
    $consulta = $connection->query($sql);

  if ($consulta->num_rows > 0) {
    echo '<section class="columnas">';

    while($fila = $consulta->fetch_assoc()) {

      $sql2 = "SELECT * FROM paises where paises.IdPais={$fila["Pais"]}";
      $consulta2 = $connection->query($sql2);
      $fila2 = $consulta2->fetch_assoc();
echo<<<EOF

             <article>
                 <h3 title="{$fila["Titulo"]}"><a href="detallefoto.php?id={$fila["IdFoto"]}">{$fila["Titulo"]}</a></h3>
                 <a href="detallefoto.php?id={$fila["IdFoto"]}"><img class="fotos" src="{$fila["Fichero"]}" alt="{$fila["Alternativo"]}" width="400"></a>

                  <ul>
                    <li><time datetime="2018-09">{$fila["FRegistro"]}</time></li>
                    <li>{$fila2["NomPais"]}</li>
                  </ul>
             </article>

EOF;

    }
    echo "</section>";
  }
  else {
        echo "0 results";
  }

$connection->close();
}
?>
