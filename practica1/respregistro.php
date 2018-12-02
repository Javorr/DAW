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
    $remail=$_POST['email'];
    $rsexonom=$_POST['genero'];
    $rfecha=$_POST['fecha'];
    $rciudad=$_POST['ciudad'];
    $rpais=$_POST['pais'];

    if(!empty($rsexonom) && $rsexonom == 'Mujer') $rsexo = 1;
    else if(!empty($rsexonom) && $rsexonom == 'Hombre') $rsexo = 2;
    else if(!empty($rsexonom) && $rsexonom == 'Otro') $rsexo = 3;
    else $rsexo = 3;

    if (!(empty($rnombre) && empty($rpass) && empty($rpass2) )) { //si se ha escrito algo en los campos
      if ($rpass == $rpass2) { //si contraseña y repetir contraseña se repiten entonces se habran realizado las comprobaciones y se mostrara la informacion introducida

        if(preg_match('/^[0-9A-Za-z]{3,15}$/', $rnombre)) { //filtro el nombre de usuario

            if(preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[0-9A-Za-z_]{6,15}$/', $rpass)) { //filtro la password

              if(!empty($remail) && filter_var($remail, FILTER_VALIDATE_EMAIL)) { //filtro el email

                if(!empty($rsexo)) { //filtro el sexo

                  if(checkdate($rfecha['month'], $rfecha['day'], $rfecha['year'])) { //filtro la fecha de nacimiento


                    require("requires/mysqli.php");

                      if ($mysqli->connect_error) {
                          die("Connection failed: " . $mysqli->connect_error);
                      }
                      else {

                        $sql = "INSERT INTO usuarios (nomusuario, clave, email, sexo, fnacimiento, ciudad, pais, foto, fregistro, estilo) VALUES ('$rnombre', '$rpass', '$remail', $rsexo, STR_TO_DATE('$rfecha', '%Y/%m/%d'), '$rciudad', $rpais, 'images/iconop.gif', date('Y-m-d H:i:s'), 1)";
                        $consulta = $mysqli->query($sql);
                        $num = mysqli_affected_rows($mysqli);
                        printf("Errormessage: %s\n", $mysqli->error);
                        echo "{$num}";
                        echo "{$rfecha}";

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
                    echo "Introduzca una fecha de nacimiento válida. <br><br>";
                  }

                }
                else {
                  echo "Introduzca un sexo válido. <br><br>";
                }

              }
              else {
                echo "Introduzca un email válido. <br><br>";
              }

            }
            else {
              echo "Introduzca una contraseña válida. <br><br>";
            }
        }
        else {
          echo "Introduzca un nombre de usuario válido. <br><br>";
        }

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
