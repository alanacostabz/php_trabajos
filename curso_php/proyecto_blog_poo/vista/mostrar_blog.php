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
  include('../modelo/manejo_objetos.php');

  try {
    $miconexion = new PDO('mysql:host=localhost:3305; dbname=bdblog', 'root', '');
    $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $manejoObjetos = new ManejoObjetos($miconexion);

    $tablaBlog = $manejoObjetos->getContenidoPorFecha();
    if (empty($tablaBlog)) {
      echo 'No hay entradas de blog aún';
    } else {
      foreach ($tablaBlog as $valor) {
        echo "<h3>" .  $valor->getTitulo() . "</h3>";
        echo "<h4>" . $valor->getFecha() . "</h4>";
        echo "<div style='width:400px'>";
        echo $valor->getComentario() . "</div>";
        if ($valor->getImagen() != "") {
          echo "<img src='../imagenes/";
          echo $valor->getImagen() . "' width='300px' height='200px'>";
        }

        echo "<hr>";
      }
    }
  } catch (Exception $e) {
    die('Error: ' . $e->getMessage());
  }

  ?>

  <br>

  <a href="formulario.php">Volver a la página de insercción</a>
</body>

</html>