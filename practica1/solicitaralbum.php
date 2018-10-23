<!-- Página “Solicitar álbum”
    Contiene un formulario con los datos necesarios para solicitar un álbum impreso. -->

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
            <span>@usuario</span>
            <div  id="sesioniniciada">
            <figure>
              <a href="usuario.html"><img src='icon.svg' alt="Foto del usuario" style="width:80%"></a>
            </figure>
            <a href="usuario.html"><h2>@usuario</h2></a>
            <a href="usuario.html">Ver perfil</a><br>
            <a href="index.html">Cerrar sesión</a>
          </div>
        </div>

        <div  id="sesioniniciada">
        <figure>
          <a href="usuario.html"><img src='icon.svg' alt="Foto del usuario" style="width:80%"></a>
        </figure>
        <a href="usuario.html"><h2>@usuario</h2></a>
        <a href="usuario.html">Ver perfil</a><br>
        <a href="index.html">Cerrar sesión</a>
      </div>

    </section>

    <section id="albumsolicitar">
        <h2>Solicita tu álbum</h2>

<!--  El formulario de solicitud de un álbum impreso contiene lo siguiente:

    Un texto inicial con una descripción del funcionamiento de esta opción.

    Una tabla con tarifas que dependen de: número de páginas, resolución, color de la portada (blanco y negro o color).

    Nombre: para el envío postal y personalización del álbum, máximo 200 caracteres, obligatorio.
    El formato es libre, pueden ser dos campos separados (nombre, apellidos) o un campo todo junto.

    Título del álbum: para la cubierta del álbum, máximo 200 caracteres, obligatorio.

    Texto adicional: un texto con una dedicatoria o una descripción del álbum, máximo 4000 caracteres.

    Correo electrónico: del destinatario del álbum, para realizar posibles notificaciones, máximo 200 caracteres, obligatorio.

    Dirección: para el envío postal, con los típicos campos (calle, número, piso, puerta, código postal, localidad, provincia y país).
    El formato es libre, decide una estructura de campos.

    Color de la portada: selector de color, el color por defecto debe ser el negro.

    Número de copias: obligatorio, valor mínimo y por defecto 1.

    Resolución de las fotos: rango entre 150 y 900 DPI, en incrementos de 150. Opcional. Valor por defecto 150.

    Álbum de fotos del portal sobre el que se basará el álbum solicitado a imprimir. Obligatorio. Se deberá escoger entre los álbumes del usuario.

    Fecha de recepción: fecha en la que el usuario desea recibir el álbum.

    Impresión a color: si el álbum se imprimirá en blanco y negro o a todo color.-->

        <p> Aquí podrás solicitar un álbum impreso. Revisa la tabla de tarifas y rellena el formulario. </p>

        <!-- TABLA DE TARIFAS -->
        <table style="width:100%">
          <caption>TABLA DE TARIFAS</caption>
          <!-- Celdas con el nombre de las columnas-->
           <tr>
             <th>Concepto</th>
             <th>Tarifa</th>
           </tr>
           <!-- Celdas con los datos -->
           <tr>
             <td>Menos de 5 páginas</td>
             <td>0,10€ por pág.</td>
           </tr>
           <tr>
             <td>Entre 5 y 10 páginas</td>
             <td>0,08€ por pág.</td>
           </tr>
           <tr>
             <td>Más de 11 páginas</td>
             <td>0,07€ por pág.</td>
           </tr>
           <tr>
             <td>Blanco y negro</td>
             <td>0€</td>
           </tr>
           <tr>
             <td>Color</td>
             <td>0,05€ por foto</td>
           </tr>
           <tr>
             <td>Resolución > 300 DPI</td>
             <td>0,02€ por foto</td>
           </tr>
        </table><br>
     </section>

      <section>

        <form action="recibiralbum.php" method="POST">
            <h2>Solicitud de álbum</h2>
              <label for="snombre">Nombre: </label><input id="snombre" type="text" name="nombre" placeholder="Nombre" maxlength="200" required><br>
              <label for="semail">Email: </label><input id="semail" type="email" name="email" placeholder="Email" maxlength="200" required><br>

              <!--Direccion-->
              <label for="sdireccion">Dirección: </label><input id="sdireccion" type="text" name="direccion" placeholder="Calle y número" required><br>
              <label for="scod">Código postal: </label><input id="scod" type="number" name="cp" placeholder="Código postal" required><br>
              <label for="slocalidad">Localidad: </label><input id="slocalidad" type="text" name="localidad" placeholder="Localidad" required><br>
              <label for="sprovincia">Provincia: </label><input id="sprovincia" type="text" name="provincia" placeholder="Provincia" required><br>
              <label for="spais">País: </label><input id="spais" type="text" name="pais" placeholder="País" required><br>
              <label for="sfecha">Fecha de envío: </label><input id="sfecha" type="date" name="fecha"> <!-- warning puesto que date no lo soportan todos los navegadores-->

              <label for="stitulo">Título del álbum: </label><input id="stitulo" type="text" name="titulo" placeholder="Título del álbum" maxlength="200" required><br>
              <label for="stexto">Texto adicional: </label><br><textarea id="stexto" name="textoadicional" rows="3" cols="40" maxlength="4000" placeholder="Escribe una dedicatoria o una descripción (opcional)"></textarea><br>
              <label for="scolor">Color: </label><input id="scolor" type="color" name="color"><br> <!-- warning puesto que color no lo soportan todos los navegadores-->
              <label for="snum">Número de copias: </label><input id="snum" type="number" name="copias" value="1" min="1" required><br>

              <label for="sresolucion">Resolucion</label>
              <select id="sresolucion" name="reso">
                <option value="150">150 DPI</option>
                <option value="300">300 DPI</option>
                <option value="450">450 DPI</option>
                <option value="600">600 DPI</option>
                <option value="750">750 DPI</option>
                <option value="900">900 DPI</option>
                <option value="---">------</option>
              </select><br>

              <label for="salbum">Álbum</label>
              <select id="salbum" name="alb">
                <option value="1">Mi álbum 1</option>
                <option value="2">Mi álbum 2</option>
                <option value="2">Mi álbum 3</option>
              </select><br>

              <label>Impresión: </label>
              <input  id="cimpresion" type="radio"  name="imp" value="Color" checked> <label for="cimpresion">Color</label>
              <input id="bynimpresion" type="radio" name="imp" value="Blanco y negro"> <label for="bynimpresion">Blanco y negro</label> <br>

            <input type="submit" name="submit" value="Enviar"><br>
        </form>

    </section>

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
