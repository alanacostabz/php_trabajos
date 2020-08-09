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
  // $semana[] = "Lunes";
  // $semana[] = "Martes";

  // $semana = array("Lunes", "Martes", "Miercoles", "Jueves");

  // echo $semana[3];

  // $datos = array("Nombre" => "Guido", "Apellido" => "Rodriguez", "Edad" => "26");
  // echo $datos["Nombre"];

  // // Recorrer un array asociativo
  // foreach ($datos as $clave => $valor) {
  //   echo "A $clave le corresponde $valor <br>";
  // }

  // if (is_array($datos)) {
  //   echo "Es un array";
  // } else {
  //   echo "No es un array";
  // }

  // Recorrer array indexado
  $semana = array("Lunes", "Martes", "Miercoles", "Jueves");
  sort($semana);

  for ($i = 0; $i < count($semana); $i++) {
    echo "$semana[$i]<br>";
  }

  $semana[] = "Viernes";



  ?>
</body>

</html>