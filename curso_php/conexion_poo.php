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
  $conexion = new mysqli('localhost:3305', 'root', '', 'pruebas');
  if ($conexion->connect_errno) {
    echo 'Falló la conexion ' . $conexion->connect_errno;
  }

  //mysqli_set_charset($conexion, 'utf8');
  $conexion->set_charset('utf8');

  $query = "SELECT * FROM PRODUCTOS";

  //$resultados = mysqli_query($conexion, $query);
  $resultado = $conexion->query($query);

  if ($conexion->errno) {
    die($conexion->error);
  }

  // while ($fila = mysqli_fetch_array($resultados, MYSQL_BOTH)) {}

  // while ($fila = $resultado->fetch_assoc()) {
  while ($fila = $resultado->fetch_array()) {
    // echo "<table><tr><td>";
    // echo $fila['CÓDIGOARTÍCULO'] . ' </td><td>';
    // echo $fila['NOMBREARTÍCULO'] . ' </td><td>';
    // echo $fila['SECCIÓN'] . ' </td><td>';
    // echo $fila['IMPORTADO'] . ' </td><td>';
    // echo $fila['PRECIO'] . ' </td><td>';
    // echo $fila['PAÍSDEORIGEN'] . ' </td><td></tr><table>';

    echo "<table><tr><td>";
    echo $fila[0] . ' </td><td>';
    echo $fila[1] . ' </td><td>';
    echo $fila[2] . ' </td><td>';
    echo $fila[3] . ' </td><td>';
    echo $fila[4] . ' </td><td>';
    echo $fila[5] . ' </td><td></tr><table>';

    echo '<br>';
    echo '<br>';
  }

  //mysqli_close($conexion);
  $conexion->close();
  ?>
</body>

</html>