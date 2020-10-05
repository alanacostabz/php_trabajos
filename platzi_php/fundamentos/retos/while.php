<?php
#Reto 1 - Suma hasta cincuenta
echo "Reto #1: Suma hasta cincuenta<br>";
$valor = 10;

while ($valor <= 50) {
    echo $valor . ",";
    $valor++;
}

$valor = 43;


#Reto 2 - Más allá del cuarenta y dos
echo "<br><br>Reto #2: Más allá del cuarenta y dos<br>";
while ($valor <= 42) {
    // aqui se preguntaria de nuevo el valor
    $valor;
}
echo "Ciclo finalizado con el valor $valor";

#Reto 3- Sumas consecutivas
echo "<br><br>Reto #3: Sumas consecutivas<br>";
$valor1 = 3;
$valor2 = 4;
$sumatoria = $valor1 + $valor2;
$respuesta = true;
echo "La suma de $valor1 + $valor2 es $sumatoria";
// while ($respuesta) {
//     echo "<br>¿Desea añadir otro número? $respuesta";
//     $nuevoNumero = 3;
//     echo "La nueva suma es: " . $respuesta += $nuevoNumero;
// }

#Reto 4- Lista de invitados
echo "<br><br>Reto #4: Lista de invitados<br>";
$invitados[] = "";
$contador = 0;
$respuesta = true;

while ($respuesta) {
    echo "Agregar invitado: Alan Acosta<br>";
    array_push($invitados, "Alan Acosta");
    $contador++;
    echo "¿Desea agregar a otro invitado? Sí<br>";
    $respuesta = true;
    array_push($invitados, "Fernanda Slaughter");
    $contador++;
    echo "¿Desea agregar a otro invitado? No<br>";
    $respuesta = false;
}

echo "<br>Lista de invitados:<br>";
foreach ($invitados as $invitado) {
    echo $invitado . "<br>";
}
echo "Total de invitados: $contador";
