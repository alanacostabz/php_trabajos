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
  $busqueda_cart = $_POST['c_art'];
  $busqueda_seccion = $_POST['seccion'];
  $busqueda_nart = $_POST['n_art'];
  $busqueda_precio = $_POST['precio'];
  $busqueda_fecha = $_POST['fecha'];
  $busqueda_seccion = $_POST['seccion'];
  $busqueda_importado = $_POST['importado'];
  $busqueda_porig = $_POST['p_orig'];

  try {
    $base = new PDO('mysql:host=localhost:3305; dbname=pruebas', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec('SET CHARACTER SET utf8');
    // $sql = "SELECT NOMBREARTÍCULO, SECCIÓN, PRECIO, PAÍSDEORIGEN FROM PRODUCTOS WHERE SECCIÓN = :secc AND PAÍSDEORIGEN = :porig";
    // $sql = "INSERT INTO PRODUCTOS(CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO, PRECIO, FECHA, IMPORTADO, PAÍSDEORIGEN) VALUES
    // (:c_art, :seccion, :n_art, :precio, :fecha, :importado, :p_orig)";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":c_art" => $busqueda_cart, ":seccion" => $busqueda_seccion, ":n_art" => $busqueda_nart, ':precio' => $busqueda_precio, ':fecha' => $busqueda_fecha, ':importado' => $busqueda_importado, 'p_orig' => $busqueda_porig));

    // while ($registro = $resultado->fetch(PDO::FETCH_BOTH)) {
    //   echo "Nombre artículo: " . $registro['NOMBREARTÍCULO'] .
    //     " Sección: " . $registro["SECCIÓN"] . " Precio: " . $registro['PRECIO'] .
    //     " País de origen: " . $registro['PAÍSDEORIGEN'] . '<br>';
    // }
    echo 'Registro insertado';
    $resultado->closeCursor();
  } catch (Exception $e) {
    die('Error' . $e->getMessage());
  } finally {
    $base = null;
  }
  ?>
</body>

</html>