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

      header("location:usuarios_registrados1.php");
    } else {
      header("location:login.php");
    }
  } catch (Exception $e) {
    die("Error " .  $e->getMessage());
  }



  ?>
</body>

</html>