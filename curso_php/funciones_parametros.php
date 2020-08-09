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
  function incrementa(&$valor1)
  {
    $valor1++;
    return $valor1;
  }

  $numero = 5;

  echo incrementa($numero) . "<br>";

  echo $numero;
  ?>
</body>

</html>