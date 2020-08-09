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



  require("datos_conexion.php");

  $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
  $usuario = mysqli_real_escape_string($conexion, $_GET['usu']);
  $contra = mysqli_real_escape_string($conexion, $_GET['con']);

  if (mysqli_connect_errno()) {
    echo 'Fallo al conectar con la BBDD';
    exit();
  }

  mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");


  mysqli_set_charset($conexion, "utf8");

  //$query = "SELECT * FROM PRODUCTOS WHERE NOMBREARTÍCULO LIKE'%$busqueda%'";
  $query = "DELETE FROM USUARIOS WHERE USUARIO ='$usuario' AND CONTRA ='$contra'";

  echo "$query <br><br> ";

  // if (mysqli_query($conexion, $query)) {
  //   echo "Baja procesada <br><br> ";
  // }

  mysqli_query($conexion, $query);

  if (mysqli_affected_rows($conexion) > 0) {
    echo 'Baja procesada';
  } else {
    echo 'No se ha encontrado usuario';
  }
  mysqli_close($conexion);

  ?>


</body>

</html>