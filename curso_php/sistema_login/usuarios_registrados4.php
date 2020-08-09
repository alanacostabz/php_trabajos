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
  session_start();
  if (!isset($_SESSION['user'])) {
    header('location:login.php');
  }
  ?>
  <h1>Bienvenido Usuarios</h1>
  <?php
  echo "Usuario: " . $_SESSION['user'] . "<br>";
  ?>
  <br>
  <p><a href="cierre.php">Cerrar Sesión</a></p>
  <p>Esto es información solo para usuarios registrados</p>

  <br>

  <p> <a href="usuarios_registrados1.php">Volver</a></p>
</body>

</html>