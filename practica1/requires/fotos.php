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

        $random = rand(0,(sizeof($arr)-1)); //pillo los datos de la foto random
        $id_random = $arr[$random][0];
        $usu_random = $arr[$random][1];
        $com_random = $arr[$random][2];

        $sql0 = "SELECT * FROM fotos where fotos.IdFoto = $id_random";
        $consulta0 = $mysqli->query($sql0);
        $fila0 = $consulta0->fetch_assoc();

echo<<<EOF

  <article id="especial">
  <h3>Foto seleccionada por los usuarios</h3>
      <h3 title="{$fila0["Titulo"]}"><a href="detallefoto.php?id={$fila0["IdFoto"]}">{$fila0["Titulo"]}</a></h3>
      <a href="detallefoto.php?id={$fila0["IdFoto"]}"><img class="fotos" src='http://localhost/files/fotos/{$fila0["Fichero"]}' alt="{$fila0["Alternativo"]}" width="400"></a>

        <ul>
         <li>Elegida por $usu_random</li>
         <li>$com_random</li>
        </ul>
  </article>

EOF;

    while($fila = $consulta->fetch_assoc()) {


      $sql2 = "SELECT * FROM paises where paises.IdPais={$fila["Pais"]}";
      $consulta2 = $mysqli->query($sql2);
      $fila2 = $consulta2->fetch_assoc();

      $fecha = date('d-m-Y', strtotime($fila["FRegistro"]));
      $hora = date('H:i', strtotime($fila["FRegistro"]));


echo<<<EOF

             <article>
                 <h3 title="{$fila["Titulo"]}"><a href="detallefoto.php?id={$fila["IdFoto"]}">{$fila["Titulo"]}</a></h3>
                 <a href="detallefoto.php?id={$fila["IdFoto"]}"><img class="fotos" src='http://localhost/files/fotos/{$fila["Fichero"]}' alt="{$fila["Alternativo"]}" width="400"></a>

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
