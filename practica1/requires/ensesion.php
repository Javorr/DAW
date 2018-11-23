<?php
  if(isset($_SESSION['nombre'])) {
    $mysqli = new mysqli("localhost", "root", "root", "pibd");

    $sentencia = "SELECT Foto from Usuarios where NomUsuario='{$_SESSION['nombre']}'";
    $fichero = $mysqli->query($sentencia);
    $fotillo = $fichero->fetch_assoc();

echo<<<EOF
<section>

    <div class="desplegable">
        <span>{$_SESSION['nombre']}</span>
        <div  id="sesioniniciada">
        <figure>
          <a href="usuario.php"><img src='{$fotillo['Foto']}' alt="Foto del usuario" style="width:80%"></a>
        </figure>
        <a href="usuario.php"><h2>{$_SESSION['nombre']}</h2></a>
        <a href="usuario.php">Ver perfil</a><br>
        <a href="cerrarsesion.php">Cerrar sesión</a>
      </div>
    </div>

    <div  id="sesioniniciada">
    <figure>
      <a href="usuario.php"><img src='{$fotillo['Foto']}' alt="Foto del usuario" style="width:80%"></a>
    </figure>
    <a href="usuario.php"><h2>{$_SESSION['nombre']}</h2></a>
    <a href="usuario.php">Ver perfil</a><br>
    <a href="cerrarsesion.php">Cerrar sesión</a>
  </div>

</section>
EOF;
  mysqli_close($mysqli);
  }

 ?>
