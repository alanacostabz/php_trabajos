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
  $pais = $_GET['buscar'];

  require('datos_conexion.php');

  $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

  if (mysqli_connect_errno()) {
    echo 'Fallo al conectar la BBDD';
    exit();
  }

  mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");
  mysqli_set_charset($conexion, "utf8");

  $sql = "SELECT CÓDIGOARTÍCULO, SECCIÓN, PRECIO, PAÍSDEORIGEN FROM PRODUCTOS WHERE PAÍSDEORIGEN=?";
  $resultado = mysqli_prepare($conexion, $sql);

  $ok = mysqli_stmt_bind_param($resultado, "s", $pais);

  $ok = mysqli_stmt_execute($resultado);

  if ($ok == false) {
    echo 'Error al ejecutar la consulta';
  } else {
    $ok = mysqli_stmt_bind_result($resultado, $codigo, $seccion, $precio, $pais);
    echo 'Artículos encontrados:<br><br>';
    while (mysqli_stmt_fetch($resultado)) {
      echo $codigo . " " . $seccion . " " . $precio . " " . $pais . "<br>";
    }
    mysqli_stmt_close($resultado);
  }
  ?>
</body>

</html>