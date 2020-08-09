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

  $id = '';
  $contenido = '';
  $tipo = '';

  require('datos_conexion.php');

  $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

  if (mysqli_connect_errno()) {
    echo 'Fallo al conectar con la BBDD';
    exit();
  }

  mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");


  mysqli_set_charset($conexion, "utf8");

  $sql = "SELECT * FROM ARCHIVOS WHERE ID= 1";

  $resultado = mysqli_query($conexion, $sql);

  while ($fila = mysqli_fetch_array($resultado)) {
    $id = $fila['id'];
    $contenido = $fila['contenido'];
    $tipo = $fila['tipo'];
  }

  echo "ID: " . $id . '<br>';
  echo "Tipo: " . $tipo . '<br>';
  echo "<img src='data:image/jpeg; base64," . base64_encode($contenido) . "'>";

  ?>


</body>

</html>