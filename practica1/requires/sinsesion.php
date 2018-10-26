<?php
error_reporting(0);
$error = $_GET['error'];

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

 ?>
