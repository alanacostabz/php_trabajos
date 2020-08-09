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
  include("concesionario.php");


  //compra_vehiculo::$ayuda=10000;

  compra_vehiculo::descuento_gobienro();

  $compra_guido = new compra_vehiculo("compacto");
  $compra_guido->climatizador();
  $compra_guido->tapiceria_cuero("blanco");
  echo $compra_guido->precio_final() . '<br>';

  $compra_messi = new compra_vehiculo("compacto");
  $compra_messi->climatizador();
  $compra_messi->tapiceria_cuero("rojo");
  echo $compra_messi->precio_final() . '<br>';

  ?>
</body>

</html>