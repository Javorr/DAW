<?php
require("requires/mysqli.php");

  if ($mysqli->connect_error) {
      die("Connection failed: " . $mysqli->connect_error);
  }
  else {
    $sql = "SELECT * FROM fotos order by  fotos.FRegistro desc LIMIT 5";
    $consulta = $mysqli->query($sql);

  if ($consulta->num_rows > 0) {
    echo '<section class="columnas">';

    $arr = array();
    $ficherolin = file("seleccionadas.txt");
    $i = 0;

    foreach ($ficherolin as $linea) {
      list($id, $usu, $com) = explode("/", $linea, 3);

      $arr[$i] = [$id, $usu, $com];
      $i++;
    }

    $fotorandom = rand(0,(sizeof($arr)-1)); //pillo los datos de la foto random
    $id_random = $arr[$random][0];
    $usu_random = $arr[$random][1];
    $com_random = $arr[$random][2];

    while($fila = $consulta->fetch_assoc()) {

      $sql2 = "SELECT * FROM paises where paises.IdPais={$fila["Pais"]}";
      $consulta2 = $mysqli->query($sql2);
      $fila2 = $consulta2->fetch_assoc();

      $fecha = date('d-m-Y', strtotime($fila["FRegistro"]));
      $hora = date('H:i', strtotime($fila["FRegistro"]));

echo<<<EOF

             <article>
                 <h3 title="{$fila["Titulo"]}"><a href="detallefoto.php?id={$fila["IdFoto"]}">{$fila["Titulo"]}</a></h3>
                 <a href="detallefoto.php?id={$fila["IdFoto"]}"><img class="fotos" src="{$fila["Fichero"]}" alt="{$fila["Alternativo"]}" width="400"></a>

                  <ul>
                    <li><time datetime="2018-09">Del $fecha a las $hora</time></li>
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

$mysqli->close();
}
?>
