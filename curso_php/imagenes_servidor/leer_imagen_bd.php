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
  require('datos_conexion.php');

  $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

  if (mysqli_connect_errno()) {
    echo 'Fallo al conectar con la BBDD';
    exit();
  }

  mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");


  mysqli_set_charset($conexion, "utf8");

  $sql = "SELECT FOTO FROM PRODUCTOS WHERE CÓDIGOARTÍCULO='AR01'";

  $resultado = mysqli_query($conexion, $sql);

  while ($fila = mysqli_fetch_array($resultado)) {
    $rutaIMG = $fila['FOTO'];
  }
  echo $rutaIMG;

  ?>

  <div>
    <img src="/intranet/uploads/<?php echo $rutaIMG; ?>" alt="Imagen artículo" width="25%">
  </div>
</body>

</html>