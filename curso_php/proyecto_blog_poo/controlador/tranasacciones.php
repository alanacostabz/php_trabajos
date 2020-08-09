<?php

include_once('../modelo/objeto_blog.php');
include_once('../modelo/manejo_objetos.php');

try {
  $miconexion = new PDO('mysql:host=localhost:3305; dbname=bdblog', 'root', '');
  $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



  if ($_FILES['imagen']['error']) {
    switch ($_FILES['imagen']['error']) {
      case 1: // Error exceso de tamaño de arvhivo en php.ini
        echo 'El tamaño del archivo excede lo permitido por el servidor';
        break;
      case 2: // Error tamaño archivo marcado desde formulario
        echo 'El tamaño del archivo excede 2 MB';
        break;
      case 3: // Corrupcion de archivo
        echo 'El envio de archivo se interrumpió';
        break;
      case 4: // No hay fichero
        echo 'No se ha enviado ningun archivo';
        break;
    }
  } else {
    echo 'Entrada subida correcamente<br>';
    if ((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error'] == UPLOAD_ERR_OK))) {
      $destinoRuta = '../imagenes/';
      move_uploaded_file($_FILES['imagen']['tmp_name'], $destinoRuta . $_FILES['imagen']['name']);
      echo 'El archivo ' .  $_FILES['imagen']['name'] . " sea ha copiado en el directorio de imagenes";
    } else {
      echo 'El archivo no se ha podido copiar al directorio de imagenes';
    }
  }

  $manejoObjetos = new ManejoObjetos($miconexion);
  $blog = new ObjetoBlog();
  $blog->setTitulo(htmlentities(addslashes($_POST['campo_titulo']), ENT_QUOTES));
  $blog->setFecha(Date("Y-m-d H:i:s"));
  $blog->setComentario(htmlentities(addslashes($_POST['area_comentarios']), ENT_QUOTES));
  $blog->setImagen($_FILES['imagen']['name']);

  $manejoObjetos->insertaContenido($blog);

  echo "<br> Entrada de blog agregada con éxito <br>";
} catch (Exception $e) {
  die('Error: ' . $e->getMessage());
}
