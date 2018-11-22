<?php

echo<<<EOF
    <section>
        <form action="respregistro.php" id="registro" method="POST">
        <label for="rnombre">Nombre usuario: </label><br><input id="rnombre" value="{$fila['NomUsuario']}" type="text" name="nombre" placeholder="Nombre" required><br>
        <label for="rpassword">Contraseña: </label><br><input id="rpassword" value="{$fila['Clave']}"  type="password" name="password" placeholder="Contraseña" required><br>
        <label for="rpassword2">Repetir contraseña: </label><br><input id="rpassword2" value="{$fila['Clave']}" type="password" name="password2" placeholder="Constraseña" required><br>
        <label for="remail">Email: </label><br><input id="remail" value="{$fila['Email']}" type="email" name="email" placeholder="Email" required><br>
        <label for="rfecha">Fecha de nacimiento: </label><br><input id="rfecha" value="{$fila['FNacimiento']}" type="date" name="fecha"  required><br> <!-- warning puesto que date no lo soportan todos los navegadores-->
        <label for="rciudad">Ciudad: </label><br><input id="rciudad" value="{$fila['Ciudad']}" type="text" name="ciudad" placeholder="Ciudad" required><br>

        <label for="selpa">Seleccionar país:</label><br>
        <select id="selpa" name="pa">
EOF;

        while($fila2 = $paises->fetch_assoc()){
          echo "<option value='{$fila2['IdPais']}'>{$fila2['NomPais']}</option>";
        }

echo<<<EOF
        </select>
        <label>Género:</label><br><input id="mgenero" type="radio" value="{$fila['Sexo']}" name="genero" value="Mujer" checked><label for="mgenero">Mujer</label> <input id="hgenero" type="radio" name="genero" value="Hombre"><label for="hgenero">Hombre</label> <input id="ogenero" type="radio" name="genero" value="Otro"> <label for="ogenero">Otro</label><br><br>
        <label for="rfoto">Foto: </label><br><input id="rfoto" value="{$fila['Foto']}" type="file" name="foto" required><br>

EOF;
?>
