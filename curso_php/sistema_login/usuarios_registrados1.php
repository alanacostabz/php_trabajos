<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    table {
      width: 50%;
      border-collapse: collapse;
      margin: auto;
    }

    body {
      text-align: center;
    }

    td,
    tr {
      border: 1px solid black;
      padding: 8px;
    }
  </style>
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
  echo "Hola: " . $_SESSION['user'] . "<br>";
  ?>
  <br>
  <p><a href="cierre.php">Cerrar Sesión</a></p>
  <p>Esto es información solo para usuarios registrados</p>
  <br>
  <table>
    <tr>
      <th colspan="3">Zona de usuarios registrados</th>
    </tr>
    <td><a href="usuarios_registrados2.php">Página 2</a></td>

    <td><a href="usuarios_registrados3.php">Página 3</a></td>

    <td><a href="usuarios_registrados4.php">Página 4</a></td>
    </tr>
  </table>
</body>

</html>