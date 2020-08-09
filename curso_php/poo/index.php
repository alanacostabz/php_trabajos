<?php
require('devuelve_productos.php');
$pais = $_GET['buscar'];
$productos = new DevuelveProductos();
$array_productos = $productos->get_productos($pais);
?>

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
  foreach ($array_productos as $elemento) {
    echo "<table><tr><td>";
    echo $elemento['CÓDIGOARTÍCULO'] . ' </td><td>';
    echo $elemento['NOMBREARTÍCULO'] . ' </td><td>';
    echo $elemento['SECCIÓN'] . ' </td><td>';
    echo $elemento['IMPORTADO'] . ' </td><td>';
    echo $elemento['PRECIO'] . ' </td><td>';
    echo $elemento['PAÍSDEORIGEN'] . ' </td><td></tr><table>';

    echo '<br>';
  }
  ?>
</body>

</html>