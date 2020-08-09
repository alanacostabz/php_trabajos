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
  $c_art = $_GET['c_art'];
  $secc = $_GET['secc'];
  $n_art = $_GET['n_art'];
  $pre = $_GET['pre'];
  $fec = $_GET['fec'];
  $imp = $_GET['imp'];
  $p_ori = $_GET['p_ori'];

  require('datos_conexion.php');

  $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

  if (mysqli_connect_errno()) {
    echo 'Fallo al conectar la BBDD';
    exit();
  }

  mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");
  mysqli_set_charset($conexion, "utf8");

  $sql = "INSERT INTO PRODUCTOS (CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO, PRECIO, FECHA, IMPORTADO, PAÍSDEORIGEN) VALUES (?,?,?,?,?,?,?)";
  $resultado = mysqli_prepare($conexion, $sql);

  $ok = mysqli_stmt_bind_param($resultado, "sssssss", $c_art, $secc, $n_art, $pre, $fec, $imp, $p_ori);

  $ok = mysqli_stmt_execute($resultado);

  if ($ok == false) {
    echo 'Error al ejecutar la consulta <br>';
    echo mysqli_error($conexion);
  } else {
    // $ok = mysqli_stmt_bind_result($resultado, $codigo, $seccion, $precio, $pais);
    echo 'Agregado nuevo registro';
    // while (mysqli_stmt_fetch($resultado)) {
    //   echo $codigo . " " . $seccion . " " . $precio . " " . $pais . "<br>";
    // }
    mysqli_stmt_close($resultado);
  }
  ?>
</body>

</html>