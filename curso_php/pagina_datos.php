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
  //$busqueda = $_GET['buscar'];  
  $usuario = $_GET['usu'];
  $contra = $_GET['con'];


  require("datos_conexion.php");

  $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

  if (mysqli_connect_errno()) {
    echo 'Fallo al conectar con la BBDD';
    exit();
  }

  mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");


  mysqli_set_charset($conexion, "utf8");

  //$query = "SELECT * FROM PRODUCTOS WHERE NOMBREARTÍCULO LIKE'%$busqueda%'";
  $query = "SELECT * FROM USUARIOS WHERE USUARIO = '$usuario' AND CONTRA = '$contra'";

  echo "$query <br></br>";

  $resultados = mysqli_query($conexion, $query);

  while ($fila = mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {
    echo "<table><tr><td>";
    echo $fila['usuario'] . ' </td><td>';
    echo $fila['contra'] . ' </td><td>';
    echo $fila['tfno'] . ' </td><td>';
    echo $fila['direccion'] . ' </td><td></tr><table>';

    echo '<br>';
    echo '<br>';
  }
  mysqli_close($conexion);

  ?>


</body>

</html>