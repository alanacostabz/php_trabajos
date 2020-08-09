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
  try {
    $base = new PDO('mysql:host=localhost:3305; dbname=pruebas', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec('SET CHARACTER SET utf8');

    $tamanioPaginas = 3;
    $pagina = 1;

    if (isset($_GET['pagina'])) {
      if ($_GET['pagina'] == 1) {
        header('Location:index.php');
      } else {
        $pagina = $_GET['pagina'];
      }
    } else {
      $pagina = 1;
    }

    $empezarDesde = ($pagina - 1) * $tamanioPaginas;

    $sqlTotal = "SELECT NOMBREARTÍCULO, SECCIÓN, PRECIO, PAÍSDEORIGEN FROM PRODUCTOS WHERE SECCIÓN = 'DEPORTES'";
    $resultado = $base->prepare($sqlTotal);
    $resultado->execute(array());
    $numFilas = $resultado->rowCount();
    $totalPaginas = ceil($numFilas / $tamanioPaginas);

    echo 'Número de registros de la consulta: ' . $numFilas . '<br>';
    echo 'Mostramos ' . $tamanioPaginas . ' registros por pagina<br>';
    echo 'Mostrando la página ' . $pagina . ' de ' .  $totalPaginas . '<br>';


    $resultado->closeCursor();

    $sqlLimite = "SELECT NOMBREARTÍCULO, SECCIÓN, PRECIO, PAÍSDEORIGEN FROM PRODUCTOS WHERE SECCIÓN = 'DEPORTES'  LIMIT $empezarDesde,$tamanioPaginas";
    $resultado = $base->prepare($sqlLimite);
    $resultado->execute(array());
    while ($registro = $resultado->fetch(PDO::FETCH_BOTH)) {

      echo "Nombre artículo: " . $registro["NOMBREARTÍCULO"] . " Sección: " . $registro['SECCIÓN'] . " Precio: " . $registro['PRECIO'] . " País: " . $registro['PAÍSDEORIGEN'] . '<br>';
    }
  } catch (Exception $e) {
    echo 'Error en la linea: ' . $e->getMessage();
  }

  //----------------------- PAGINACIÓN ----------------------------
  for ($i = 1; $i <= $totalPaginas; $i++) {
    echo ' <a href="?pagina=' . $i . '">' . $i . '</a>';
  }
  ?>
</body>

</html>