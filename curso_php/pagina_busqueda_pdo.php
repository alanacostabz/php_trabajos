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
  $busqueda_sec = $_GET['seccion'];
  $busqueda_porig = $_GET['p_orig'];
  try {
    $base = new PDO('mysql:host=localhost:3305; dbname=pruebas', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec('SET CHARACTER SET utf8');
    $sql = "SELECT NOMBREARTÍCULO, SECCIÓN, PRECIO, PAÍSDEORIGEN FROM PRODUCTOS WHERE SECCIÓN = :secc AND PAÍSDEORIGEN = :porig";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":secc" => $busqueda_sec, ":porig" => $busqueda_porig));

    while ($registro = $resultado->fetch(PDO::FETCH_BOTH)) {
      echo "Nombre artículo: " . $registro['NOMBREARTÍCULO'] .
        " Sección: " . $registro["SECCIÓN"] . " Precio: " . $registro['PRECIO'] .
        " País de origen: " . $registro['PAÍSDEORIGEN'] . '<br>';
    }
    $resultado->closeCursor();
  } catch (Exception $e) {
    die('Error' . $e->getMessage());
  } finally {
    $base = null;
  }
  ?>
</body>

</html>