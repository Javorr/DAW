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

          if($_FILES["foto"]["error"] > 0)
             {
               echo "Error: " . $msgError[$_FILES["foto"]["error"]] . "<br />";
             }
             else
             {
               echo "Nombre original: " . $_FILES["foto"]["name"] . "<br />";
               echo "Tipo: " . $_FILES["foto"]["type"] . "<br />";
               echo "Tamaño: " . ceil($_FILES["foto"]["size"] / 1024) . " Kb<br />";
               echo "Nombre temporal: " . $_FILES["foto"]["tmp_name"] . "<br />";


               $sentencia = "SELECT IdUsuario from Usuarios where NomUsuario='{$_SESSION['nombre']}'";
               $usu = $mysqli->query($sentencia);
               $idusu = $usu->fetch_assoc();
               $id = $idusu['IdUsuario'];

              echo "oye".$id;

               move_uploaded_file($_FILES["foto"]["tmp_name"],
                  "D:\\xampp\\files\\" . $_FILES["foto"]["name"]);
              echo "Almacenado en: " . "D:\\xampp\\files\\" . $_FILES["foto"]["name"];

             }
          $rfregistro = date('Y-m-d H:i:s');
          $sql = "INSERT INTO usuarios (nomusuario, clave, email, sexo, fnacimiento, ciudad, pais, foto, fregistro, estilo) VALUES ('$rnombre', '$rpass', '$remail', $rsexo, STR_TO_DATE('$rfecha', '%Y-%m-%d'), '$rciudad', $rpais, 'images/iconop.gif', '$rfregistro', 1)";
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
            </ul>
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
