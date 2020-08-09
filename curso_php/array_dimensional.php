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
  $alimentos = [
    "Fruta" => ["troplical" => "kiwi", "citrico" => "mandarina", "otros" => "manzana"],
    "Leche" => ["animal" => "vaca", "vegetal" => "coco"],
    "Carne" => ["vacuno" => "lomo", "porcino" => "pata"]
  ];

  //echo $alimentos["Carne"]["porcino"];
  // foreach ($alimentos as $clave_alim => $alim) {
  //   echo "$clave_alim:<br>";

  //   foreach ($alim as $clave => $valor) {
  //     echo "$clave=$valor<br>";
  //   }

  //   echo "<br>";
  // }

  echo var_dump($alimentos);
  ?>
</body>

</html>