<!--  Respuesta página con el formulario de registro como nuevo usuario
    Muestra los datos que el usuario ha introducido en el formulario de registro. Se debe comprobar que se ha escrito algo en el nombre de usuario, en la contraseña y en repetir contraseña, y que contraseña y repetir contraseña coinciden. La validación del resto de campos del formulario se implementará en una próxima práctica. Importante: en esta página no se debe mostrar la fotografía de perfil seleccionada por el usuario, la subida de ficheros al servidor se implementará en una próxima práctica.   -->

    <?php
    session_start();

    if((isset($_POST['nombre']))) {
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/sinsesion.php");
    require_once("requires/filtros.php");

    if($filtros === true) {

      require("requires/mysqli.php");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        else {


          $rfregistro = date('Y-m-d H:i:s');
          $sql = "INSERT INTO usuarios (nomusuario, clave, email, sexo, fnacimiento, ciudad, pais, foto, fregistro, estilo) VALUES ('$rnombre', '$rpass', '$remail', $rsexo, STR_TO_DATE('$rfecha', '%Y-%m-%d'), '$rciudad', $rpais, 'vacio', '$rfregistro', 2)";
          $consulta = $mysqli->query($sql);

          $sentencia = "SELECT IdUsuario from Usuarios where NomUsuario='$rnombre'";
          $usu = $mysqli->query($sentencia);
          $idusu = $usu->fetch_assoc();
          $id = $idusu['IdUsuario'];

          $defi = 'cosa.jpg';
          $ruta = "http://localhost/files/perfil/cosa.jpg";

          if($_FILES["foto"]["error"] > 0)
             {

             }
             else
             {
               /*
               echo "Nombre original: " . $_FILES["foto"]["name"] . "<br />";
               echo "Tipo: " . $_FILES["foto"]["type"] . "<br />";
               echo "Tamaño: " . ceil($_FILES["foto"]["size"] / 1024) . " Kb<br />";
               echo "Nombre temporal: " . $_FILES["foto"]["tmp_name"] . "<br />";
              */

              $formato = explode("/", $_FILES["foto"]["type"]);

              $defi = $id.".".$formato[1];
              //echo $defi;

              $ruta = "http://localhost/files/perfil/".$defi;
              //echo "ruta " . $ruta;

               move_uploaded_file($_FILES["foto"]["tmp_name"],
                  "D:\\xampp\\htdocs\\files\\perfil\\".$defi);
                  //echo "Almacenado en: " . "D:\\xampp\\htdocs\\files\\".$defi;

             }

             $sql = "UPDATE usuarios SET foto = '$defi' WHERE IdUsuario = $id";
             $consulta = $mysqli->query($sql);


          $sql2 = "SELECT NomPais FROM paises where paises.IdPais=$rpais";
          $consulta2 = $mysqli->query($sql2);
          $rnompais = $consulta2->fetch_assoc();

}

echo<<<EOF
          <section>
            <h2>Registro realizado con éxito</h2>
            <p><b>Inserción realizada, tus datos son:</b></p>
            <ul>
              <li>Nombre usuario: $rnombre.</li>
              <li>Contraseña: $rpass.</li>
              <li>Email: $remail.</li>
              <li>Fecha de nacimiento: $rfecha.</li>
              <li>Ciudad: $rciudad.</li>
              <li>País de residencia: {$rnompais['NomPais']}.</li>
              <li>Género: $rsexonom.</li>
              <li>Icono:</li>
            </ul>

            <figure>
              <img src='$ruta' alt="Foto del usuario" style="width:15%">
            </figure>

          </section>
EOF;
    }
    else {
      echo "<p>No se ha podido realizar el registro con éxito.</p><a href='registro.php'>Volver a intentarlo</a>";
    }

    $volver="index.php";
    require_once("requires/pie.php");

  }
  else {
      $host = $_SERVER['HTTP_HOST'];
      $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = 'index.php';
      header("Location: http://$host$uri/$extra");
      exit;
  }

?>
