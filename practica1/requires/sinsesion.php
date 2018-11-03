<?php
error_reporting(0);
$error = $_GET['error'];

if(!(isset($_SESSION['nombre']))) { //si no esta iniciado en sesion tendra la opcion de iniciar sesion
echo<<<EOF
<section>
    <div class="desplegable">
      <span>Iniciar sesión / Registro</span>

      <form action="controlacceso.php" id="inicio">
          <h2 id="ti">Iniciar sesión</h2>
          <input id="fnombre" type="text" name="nombre" placeholder="Nombre" required><br>
          <input id="fpassword" type="password" name="password" placeholder="Contraseña" required><br>
          <input id="botoni" type="submit" name="submit" value="Iniciar sesión"><br/>
EOF;

          if($error=='401'){
          echo "<p style='color: red;'>Usuario incorrecto</p><br>";
          }

echo<<<EOF
          <a id="linkre" href="Registro.php">¿No tienes cuenta? ¡Regístrate!</a>
      </form>
    </div>

    <form action="controlacceso.php" id="inicio">
        <h2 id="ti">Iniciar sesión</h2>
        <input id="fnombre" type="text" name="nombre" placeholder="Nombre" required><br>
        <input id="fpassword" type="password" name="password" placeholder="Contraseña" required><br>
        <input id="botoni" type="submit" name="submit" value="Iniciar sesión"><br/>
EOF;

    if($error=='401'){
    echo "<span style='color:red;'>Usuario incorrecto</span><br>";
    }

echo<<<EOF
    <a id="linkre" href="Registro.php">¿No tienes cuenta? ¡Regístrate!</a>
  </form>
</section>
EOF;
}

else { //si esta iniciado en sesion aparecera su nombre de usuario
echo<<<EOF
<section>

    <div class="desplegable">
        <span>{$_SESSION['nombre']}</span>
        <div  id="sesioniniciada">
        <figure>
          <a href="usuario.php"><img src='images/icon.svg' alt="Foto del usuario" style="width:80%"></a>
        </figure>
        <a href="usuario.php"><h2>{$_SESSION['nombre']}</h2></a>
        <a href="usuario.php">Ver perfil</a><br>
        <a href="index.php">Cerrar sesión</a>
      </div>
    </div>

    <div  id="sesioniniciada">
    <figure>
      <a href="usuario.php"><img src='images/icon.svg' alt="Foto del usuario" style="width:80%"></a>
    </figure>
    <a href="usuario.php"><h2>{$_SESSION['nombre']}</h2></a>
    <a href="usuario.php">Ver perfil</a><br>
    <a href="index.php">Cerrar sesión</a>
  </div>

</section>
EOF;

}

 ?>
