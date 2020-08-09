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
  $num1 = rand(1, 10);
  $num2 = pow(5, 3);
  $num3 = 5.23434234234;
  $num4 = "4";
  $resultado = (int) $num4;
  $redondeo = round($num3, 0);

  echo "El número es: " . $num1 . "<br>";
  echo "El número es: " . $num2 . "<br>";
  echo "El número es: " . $num3 . "<br>";
  echo "El número es: " . ($num3 + $num4) . "<br>";
  echo "El número es: " . ($resultado) . "<br>";
  ?>
</body>

</html>