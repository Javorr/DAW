<!--  Respuesta página con el formulario de registro como nuevo usuario
    Muestra los datos que el usuario ha introducido en el formulario de registro. Se debe comprobar que se ha escrito algo en el nombre de usuario, en la contraseña y en repetir contraseña, y que contraseña y repetir contraseña coinciden. La validación del resto de campos del formulario se implementará en una próxima práctica. Importante: en esta página no se debe mostrar la fotografía de perfil seleccionada por el usuario, la subida de ficheros al servidor se implementará en una próxima práctica.   -->

    <?php
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/sinsesion.php");
     ?>

    <?php
    $rnombre=$_POST['nombre'];
    $rpass=$_POST['password'];
    $rpass2=$_POST['password2'];
    $remail=$_POST['email'];
    $rfecha=$_POST['fecha'];
    $rciudad=$_POST['ciudad'];
    $rpais=$_POST['pais'];
    $rgenero=$_POST['genero'];

    if (!(empty($rnombre) && empty($rpass) && empty($rpass2) )) { //si se ha escrito algo en los campos
      if ($rpass == $rpass2) { //si contraseña y repetir contraseña se repiten entonces se habran realizado las comprobaciones y se mostrara la informacion introducida

        echo "            <section>
                          <h2>Registro realizado con éxito</h2>
                          <p><b>Inserción realizada, tus datos son:</b></p>
                            <p>Nombre usuario: ".$rnombre.".</p>
                            <p>Contraseña: ".$rpass.".</p>
                            <p>Email: ".$remail.".</p>
                            <p>Fecha de nacimiento: ".$rfecha.".</p>
                            <p>Ciudad: ".$rciudad.".</p>
                            <p>País de residencia: ".$rpais.".</p>
                            <p>Género: ".$rgenero.".</p>
                        </section>";
      }
    }

     ?>

    <!-- En el pie de página incluye los nombres de los autores de la práctica, un aviso de copyright con el año y alguna información más. -->
    <?php $volver="index.php";
    require_once("requires/pie.php"); ?>
