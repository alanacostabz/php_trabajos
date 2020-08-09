<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <?php
  function ejecuta_consulta($laBusqueda)
  {

    // $busqueda = $_GET['buscar'];

    require("datos_conexion.php");

    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

    if (mysqli_connect_errno()) {
      echo 'Fallo al conectar con la BBDD';
      exit();
    }

    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");


    mysqli_set_charset($conexion, "utf8");

    $query = "SELECT * FROM PRODUCTOS WHERE NOMBREARTÍCULO LIKE'%$laBusqueda%'";

    $resultados = mysqli_query($conexion, $query);

    while ($fila = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
      echo "<table><tr><td>";
      echo $fila['CÓDIGOARTÍCULO'] . ' </td><td>';
      echo $fila['NOMBREARTÍCULO'] . ' </td><td>';
      echo $fila['SECCIÓN'] . ' </td><td>';
      echo $fila['IMPORTADO'] . ' </td><td>';
      echo $fila['PRECIO'] . ' </td><td>';
      echo $fila['PAÍSDEORIGEN'] . ' </td><td></tr><table>';

      echo '<br>';
      echo '<br>';
    }
    mysqli_close($conexion);
  }

  ?>


</head>

<body>
  <?php
  $miBusqueda = $_GET['buscar'];
  $miPag = $_SERVER['PHP_SELF'];

  if ($miBusqueda != null) {
    ejecuta_consulta($miBusqueda);
  } else {
    echo ("<form action='$miPag' method='GET'>
    <label>Buscar: <input type='text' name='buscar'></label>
    <input type='submit' name='enviando' value='Ir'>
    </form>");
  }
  ?>
</body>

</html>