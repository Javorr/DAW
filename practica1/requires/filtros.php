<!--  Respuesta página con el formulario de registro como nuevo usuario
    Muestra los datos que el usuario ha introducido en el formulario de registro. Se debe comprobar que se ha escrito algo en el nombre de usuario, en la contraseña y en repetir contraseña, y que contraseña y repetir contraseña coinciden. La validación del resto de campos del formulario se implementará en una próxima práctica. Importante: en esta página no se debe mostrar la fotografía de perfil seleccionada por el usuario, la subida de ficheros al servidor se implementará en una próxima práctica.   -->

    <?php

    $rnombre=$_POST['nombre'];
    $rpass=$_POST['password'];
    $rpass2=$_POST['password2'];
    $rpassconf=$_POST['passconf'];
    $remail=$_POST['email'];
    $rsexonom=$_POST['genero'];
    $rfecha=$_POST['fecha'];
    $rciudad=$_POST['ciudad'];
    $rpais=$_POST['pais'];
    $filtros = false;
    $nomcorrecto = false;
    $borrar = 0;
      if(isset($_POST['del']) and $_POST['del'] == '1'){
        $borrar=1;
      }

    if(!empty($rsexonom) && $rsexonom == 'Mujer') $rsexo = 1;
    else if(!empty($rsexonom) && $rsexonom == 'Hombre') $rsexo = 2;
    else if(!empty($rsexonom) && $rsexonom == 'Otro') $rsexo = 3;
    else $rsexo = 3;

    require("requires/mysqli.php");

    $sql = "SELECT Clave FROM usuarios where NomUsuario='{$_SESSION['nombre']}'";
    $consulta = $mysqli->query($sql);

    $pass = $consulta->fetch_assoc();

    $sql = "SELECT * FROM usuarios where NomUsuario='{$_POST['nombre']}'";
    $consulta = $mysqli->query($sql);

    $nomusuario = $consulta->fetch_assoc();
    if($consulta->num_rows > 0) {
      if(isset($_SESSION['nombre']) && $_SESSION['nombre'] == $_POST['nombre']) {
        $nomcorrecto = true;
      }
    }
    else {
      $nomcorrecto = true;
    }

    if (!(empty($rnombre) && empty($rpass) && empty($rpass2) )) { //si se ha escrito algo en los campos
      if ($rpass == $rpass2 && $rpassconf == $pass['Clave']) { //si contraseña y repetir contraseña se repiten entonces se habran realizado las comprobaciones y se mostrara la informacion introducida

        if(preg_match('/^[0-9A-Za-z]{3,15}$/', $rnombre) && $nomcorrecto) { //filtro el nombre de usuario

            if(preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[0-9A-Za-z_]{6,15}$/', $rpass)) { //filtro la password
              list($emailnom, $dominio) = explode("@", $remail);
              $dominio = explode(".", $dominio);
              if(!empty($remail) && filter_var($remail, FILTER_VALIDATE_EMAIL) && strlen($dominio[sizeof($dominio)-1]) >= 2 && strlen($dominio[sizeof($dominio)-1]) <= 4) { //filtro el email

                if(!empty($rsexo)) { //filtro el sexo

                  if(checkdate(date("m",strtotime($rfecha)), date("d",strtotime($rfecha)), date("Y",strtotime($rfecha)))) { //filtro la fecha de nacimiento

                    $filtros = true;


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

?>
