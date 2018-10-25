
<!--  DECLARACIÓN DE ACCESIBILIDAD -->

<?php
require_once("requires/cabecera.php");
require_once("requires/inicio.php");
 ?>


  <div id="declaracion">
    <h2>Declaración de accesibilidad</h2>

    <p>El portal web de Imagehony se ha desarrollado adoptando ciertas medidas con la finalidad
      de mejorar su accesibilidad y usabilidad, para pueda ser navegado por un mayor número de usuarios,
      sin importar sus circunstancias o capacidades.</p>

    <p>Algunos de los aspectos que se han trabajado son:</p>
    <ul>
      <li>Uso de hojas de estilo para separar el contenido de la presentación.</li>
      <li>Alternativas textuales a ciertos contenidos visuales.</li>
      <li>Correcto estructurado y etiquetado del contenido de las páginas.</li>
      <li>Realizar una maquetación con CSS de diseño líquido para que se adapte sin problema a diversas pantallas.</li>
      <li>Uso de texto significativo en los enlaces.</li>
      <li>Tamaño del contenido definido en unidades relativas para que pueda ampliarse o reducirse por el usuario.</li>
      <li>Evitación del uso de tablas para maquetar las páginas.</li>
      <li>Correcto contraste entre los colores, especificados mediante números y evitando los nombres. La información no se transmite solo con el color.</li>
      <li>Uso de bordes que delimitan correctamente los distintos bloques de contenido.</li>
      <li>Focos visibles.</li>
    </ul>

    <p>Consejos de accesibilidad:</p>
    <ul>
      <li>Navegación desde el teclado (Tab, Shift+Tab, Enter)</li>
      <li>Aumento y/o reducción del tamaño (CTRL+, CTRL-)</li>
    </ul>
  </div>

    <!-- En el pie de página incluye los nombres de los autores de la práctica, un aviso de copyright con el año y alguna información más. -->
    <?php $volver="index.php";
     require_once("requires/pie.php"); ?>
