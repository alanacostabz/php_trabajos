<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    h1,
    h2 {
      text-align: center;
    }

    table {
      width: 25%;
      background-color: #ffc;
      border: 2px dotted #f00;
      margin: auto;
    }

    .izq {
      text-align: right;
    }

    .der {
      text-align: left;
    }

    td {
      text-align: center;
      padding: 10px;
    }
  </style>
</head>

<body>
  <?php
  if (isset($_POST['enviar'])) {
    try {
      $base = new PDO("mysql:host=localhost:3305; dbname=pruebas", "root", "");
      $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT * FROM USERS WHERE USER = :login AND PASSWORD = :password";
      $resultado = $base->prepare($sql);

      $login = htmlentities(addslashes($_POST["login"]));
      $password = htmlentities(addslashes($_POST["password"]));

      $resultado->bindValue(":login", $login);
      $resultado->bindValue(":password", $password);
      $resultado->execute();

      $numeroRegistro = $resultado->rowCount();

      if ($numeroRegistro != 0) {
        session_start();

        $_SESSION["user"] = $_POST["login"];

        // header("location:usuarios_registrados1.php");
      } else {
        // header("location:login.php");
        echo 'Usuario o contraseña incorrectos';
      }
    } catch (Exception $e) {
      die("Error " .  $e->getMessage());
    }
  }
  ?>

  <?php
  if (!isset($_SESSION['user'])) {
    include('formulario.html');
  } else {
    echo 'Usuario: ' . $_SESSION["user"];
  }
  ?>

  <h2>Contenido de la web</h2>
  <table width="800" border="0">
    <tr>
      <td><img src="img/jf.jpg" width="300" height="166"></td>
      <td><img src="img/jf1.jpg" width="300" height="171"></td>
    </tr>
    <tr>
      <td><img src="img/jf2.jpg" width="300" height="166"></td>
      <td><img src="img/jf3.jpg" width="300" height="197"></td>
    </tr>
  </table>
</body>

</html>