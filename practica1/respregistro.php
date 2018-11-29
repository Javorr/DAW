<!--  Respuesta página con el formulario de registro como nuevo usuario
    Muestra los datos que el usuario ha introducido en el formulario de registro. Se debe comprobar que se ha escrito algo en el nombre de usuario, en la contraseña y en repetir contraseña, y que contraseña y repetir contraseña coinciden. La validación del resto de campos del formulario se implementará en una próxima práctica. Importante: en esta página no se debe mostrar la fotografía de perfil seleccionada por el usuario, la subida de ficheros al servidor se implementará en una próxima práctica.   -->

    <?php
    session_start();

    if((isset($_POST['nombre']))) {
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/sinsesion.php");

    $rnombre=$_POST['nombre'];
    $rpass=$_POST['password'];
    $rpass2=$_POST['password2'];

    if (!(empty($rnombre) && empty($rpass) && empty($rpass2) )) { //si se ha escrito algo en los campos
      if ($rpass == $rpass2) { //si contraseña y repetir contraseña se repiten entonces se habran realizado las comprobaciones y se mostrara la informacion introducida

        if(preg_match("/[^\x00-\x7F]/", $rnombre)) { //filtro el nombre de usuario
            if(3<=strlen($rnombre)<=15) {
              //entonces guay
            }
        }


        require("requires/mysqli.php");

          if ($mysqli->connect_error) {
              die("Connection failed: " . $mysqli->connect_error);
          }
          else {

            $sql = "SELECT * FROM paises order by NomPais";
            $consulta = $mysqli->query($sql);
          }


echo<<<EOF
                        <section>
                          <h2>Registro realizado con éxito</h2>
                          <p><b>Inserción realizada, tus datos son:</b></p>
                          <ul>
                            <li>Nombre usuario: $rnombre.</li>
                            <li>Contraseña: $rpass.</li>
                            <li>Email: {$_POST['email']}.</li>
                            <li>Fecha de nacimiento: {$_POST['fecha']}.</li>
                            <li>Ciudad: {$_POST['ciudad']}.</li>
                            <li>País de residencia: {$_POST['pais']}.</li>
                            <li>Género: {$_POST['genero']}.</li>
                          </ul>
                        </section>
EOF;

      }
      else {
        echo "Las contraseñas no coinciden. <br><br>";
      }
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
