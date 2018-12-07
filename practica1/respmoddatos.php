<!--  Respuesta página con el formulario de registro como nuevo usuario
    Muestra los datos que el usuario ha introducido en el formulario de registro. Se debe comprobar que se ha escrito algo en el nombre de usuario, en la contraseña y en repetir contraseña, y que contraseña y repetir contraseña coinciden. La validación del resto de campos del formulario se implementará en una próxima práctica. Importante: en esta página no se debe mostrar la fotografía de perfil seleccionada por el usuario, la subida de ficheros al servidor se implementará en una próxima práctica.   -->

    <?php
    session_start();

    if((isset($_POST['nombre']))) {
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/filtros.php");

    if($filtros === true) {

      require("requires/mysqli.php");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        else {
          $sql0 = "SELECT * FROM usuarios where usuarios.NomUsuario='{$_SESSION['nombre']}'";
          $consulta0 = $mysqli->query($sql0);
          $infoprevia = $consulta0->fetch_assoc();

          $id = $infoprevia['IdUsuario'];
          if(empty($rnombre)) $rnombre = $infoprevia['NomUsuario'];
          if(empty($rpass)) $rpass = $infoprevia['Clave'];
          if(empty($remail)) $remail = $infoprevia['Email'];
          if(empty($rsexo)) $rsexo = $infoprevia['Sexo'];
          if(empty($rfecha)) $rfecha = $infoprevia['FNacimiento'];
          if(empty($rciudad)) $rciudad = $infoprevia['Ciudad'];
          if(empty($rpais)) $rpais = $infoprevia['Pais'];

          $sql = "UPDATE usuarios SET nomusuario = '$rnombre', clave = '$rpass', email = '$remail', sexo = $rsexo, fnacimiento = STR_TO_DATE('$rfecha', '%Y-%m-%d'), ciudad = '$rciudad', pais = $rpais WHERE IdUsuario = $id";
          $consulta = $mysqli->query($sql);

          if(mysqli_affected_rows($mysqli)>0) $_SESSION['nombre']=$rnombre;  //nos guardamos el nuevo nombre en la sesion para que se pueda mostrar de manera correcta todo en ensesion.php

          $sql2 = "SELECT NomPais FROM paises where paises.IdPais=$rpais";
          $consulta2 = $mysqli->query($sql2);
          $rnompais = $consulta2->fetch_assoc();

          require_once("requires/ensesion.php");
        }


echo<<<EOF
          <section>
            <h2>Modificación realizada con éxito</h2>
            <p><b>Tus datos son ahora:</b></p>
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
      echo "<p>No se ha podido realizar la modificación con éxito.</p><a href='modificardatos.php'>Volver a intentarlo</a>";
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
