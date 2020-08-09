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
  include("vehiculos.php");


  $bmw = new Coche();
  $gmc = new Camion();

  echo "El BMW tiene " . $bmw->get_ruedas() . " ruedas<br>";
  echo "El GMC tiene " . $gmc->get_ruedas() . " ruedas<br>";
  echo "El BMW tiene un mortor de " . $bmw->get_motor() . " cc<br>";

  // echo "El BMW tiene " . $bmw->ruedas . " ruedas <br>";
  // echo "El GMC tiene " . $gmc->ruedas . " ruedas <br>";

  // $gmc->frenar();
  // $gmc->arrancar();
  // $gmc->establece_color("Negro", "PEMEX");
  ?>
</body>

</html>