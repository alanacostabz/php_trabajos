<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <?php
  $miConexion = mysqli_connect("localhost:3305", "root", "", "bdblog");

  // Comprobar conexión
  if (!$miConexion) {
    echo "La conexión ha fallado: " . mysqli_error($miConexion);
    exit();
  }

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
      $destinoRuta = 'imagenes/';
      move_uploaded_file($_FILES['imagen']['tmp_name'], $destinoRuta . $_FILES['imagen']['name']);
      echo 'El archivo ' .  $_FILES['imagen']['name'] . " sea ha copiado en el directorio de imagenes";
    } else {
      echo 'El archivo no se ha podido copiar al directorio de imagenes';
    }
  }

  $titulo = $_POST['campo_titulo'];
  $fecha = date("Y-m-d H:i:s");
  $comentario = $_POST['area_comentarios'];
  $imagen = $_FILES['imagen']['name'];

  $miConsulta = "INSERT INTO CONTENIDO (TITULO, FECHA, COMENTARIO, IMAGEN) VALUES ('$titulo','$fecha','$comentario','$imagen')";
  $resultado = mysqli_query($miConexion, $miConsulta);

  // Cerramos conexion
  mysqli_close($miConexion);

  echo '<br>Se ha agreado el comentario con éxito<br><br>';
  echo $miConsulta . '<br>';

  ?>

  <a href="Formulario.php">Añadir nueva entrada</a>
  <a href="mostrar_blog.php">Ver blog</a>
</body>

</html>