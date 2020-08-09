<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    .resaltar {
      color: #f00;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <?php
  $variable1 = 'casa';
  $variable2 = 'CASA';

  $resultado = strcmp($variable1, $variable2); // Devuelve 1 si no son iguales y 0 si son iguales
  $resultado2 = strcasecmp($variable1, $variable2); // Compara sin importar mayusculas y minusculas
  // echo 'El resultado es: ' . $resultado . '<br>';
  // echo 'El resultado es: ' . $resultado2;

  if (!$resultado) {
    echo 'Coinciden';
  } else {
    echo 'No coinciden';
  }



  ?>

</body>

</html>