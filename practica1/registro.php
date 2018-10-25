<!--  Página con el formulario de registro como nuevo usuario
    Contiene un formulario con los datos necesarios para registrarse
    (nombre de usuario, contraseña, repetir contraseña, dirección de email, sexo, fecha de nacimiento, ciudad y país de residencia, foto).  -->

    <?php
    require_once("requires/cabecera.php");
    require_once("requires/inicio.php");
    require_once("requires/sinsesion.php");
     ?>

    <section>
        <form action="respregistro.php" id="registro" method="POST">
            <h2>Regístrate</h2>
            <label for="rnombre">Nombre usuario: </label><br><input id="rnombre" type="text" name="nombre" placeholder="Nombre" required><br>
            <label for="rpassword">Contraseña: </label><br><input id="rpassword" type="password" name="password" placeholder="Contraseña" required><br>
            <label for="rpassword2">Repetir contraseña: </label><br><input id="rpassword2" type="password" name="password2" placeholder="Constraseña" required><br>
            <label for="remail">Email: </label><br><input id="remail" type="email" name="email" placeholder="Email" required><br>
            <label for="rfecha">Fecha de nacimiento: </label><br><input id="rfecha" type="date" name="fecha"  required><br> <!-- warning puesto que date no lo soportan todos los navegadores-->
            <label for="rciudad">Ciudad: </label><br><input id="rciudad" type="text" name="ciudad" placeholder="Ciudad" required><br>
            <label for="rpais">País de residencia: </label><br><input id="rpais" type="text" name="pais" placeholder="País" required><br>
            <label>Género:</label><br><input id="mgenero" type="radio" name="genero" value="Mujer" checked><label for="mgenero">Mujer</label> <input id="hgenero" type="radio" name="genero" value="Hombre"><label for="hgenero">Hombre</label> <input id="ogenero" type="radio" name="genero" value="Otro"> <label for="ogenero">Otro</label><br><br>
            <label for="rfoto">Foto: </label><br><input id="rfoto" type="file" name="foto" required><br>
            <input type="submit" name="submit" value="Registrarse"><br />
        </form>
    </section>

    <!-- En el pie de página incluye los nombres de los autores de la práctica, un aviso de copyright con el año y alguna información más. -->
    <?php $volver="index.php";
    require_once("requires/pie.php"); ?>
