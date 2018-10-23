<!--  Respuesta página con el formulario de registro como nuevo usuario
    Muestra los datos que el usuario ha introducido en el formulario de registro. Se debe comprobar que se ha escrito algo en el nombre de usuario, en la contraseña y en repetir contraseña, y que contraseña y repetir contraseña coinciden. La validación del resto de campos del formulario se implementará en una próxima práctica. Importante: en esta página no se debe mostrar la fotografía de perfil seleccionada por el usuario, la subida de ficheros al servidor se implementará en una próxima práctica.   -->

<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Javier Martinez y Monica Ramperez" />
    <meta name="description" content="Pagina web de fotografia" />

    <link rel="stylesheet" type="text/css" href="estilos.css" title="Default Style"/>
    <link rel="alternate stylesheet" type="text/css" href="ua.css" title="UA Style"/>
    <link rel="stylesheet" type="text/css" href="impresion.css" media="print"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <title>Imagehony</title>
  </head>

  <body>

    <header>
        <a id="arriba" href="index.html"><img src='logo.png' alt="Logotipo" width="300"></a>
        <h2>Tu web de fotografía</h2>
    </header>

    <section>
        <div class="desplegable">
          <span>Iniciar sesión / Registro</span>

          <form action="usuario.html" id="inicio">
              <h2 id="ti">Iniciar sesión</h2>
              <input id="fnombre" type="text" placeholder="Nombre" required><br>
              <input id="fpassword" type="password" name="password" placeholder="Contraseña" required><br>
              <input id="botoni" type="submit" name="submit" value="Iniciar sesión"><br/>
              <a id="linkre" href="Registro.html">¿No tienes cuenta? ¡Regístrate!</a>
          </form>
        </div>

        <form action="usuario.html" id="inicio">
            <h2 id="ti">Iniciar sesión</h2>
            <input id="fnombre" type="text" placeholder="Nombre" required><br>
            <input id="fpassword" type="password" name="password" placeholder="Contraseña" required><br>
            <input id="botoni" type="submit" name="submit" value="Iniciar sesión"><br/>
            <a id="linkre" href="Registro.html">¿No tienes cuenta? ¡Regístrate!</a>
        </form>
    </section>

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
                            <p>Nombre usuario: $rnombre.</p>
                            <p>Contraseña: $rpass.</p>
                            <p>Email: $remail.</p>
                            <p>Fecha de nacimiento: $rfecha.</p>
                            <p>Ciudad: $rciudad.</p>
                            <p>País de residencia: $rpais.</p>
                            <p>Género: $rgenero.</p>
                        </section>";
      }
    }

     ?>

    <!-- En el pie de página incluye los nombres de los autores de la práctica, un aviso de copyright con el año y alguna información más. -->
    <footer>
      <a href="#arriba">Volver a index</a><br>
      <a href="accesibilidad.html">Declaración de accesibilidad</a>
        <p>&copy;<time datetime="2018-09"> Septiembre 2018</time></p>

        <p>
          <a href="http://jigsaw.w3.org/css-validator/check/referer">
              <img style="border:0;width:88px;height:31px"
                  src="http://jigsaw.w3.org/css-validator/images/vcss"
                  alt="¡CSS Válido!" />
          </a>
        </p>

        <p>Javier Martínez y Mónica Rampérez</p>
    </footer>

  </body>

</html>
