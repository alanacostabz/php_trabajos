<?php

/**
 * EJERCICIO #1
 * Calcula el resultado de 32+3 y 3(2+3). 
 * Escribe el procedimiento que empleaste 
 * en la sección de discusiones.
 */

$operacion1 = 32 + 3;
$operacion2 = 3 * (2 + 3);
echo '<pre>';
echo 'Ejercicio #1';
echo '<br>';
echo '32+2= ' . $operacion1 . '<br>';
echo '3(2+3)= ' . $operacion2 . '<br>';

echo '<br>';

/**
 * Ejercicio #2
 * Tomando en cuenta que tenemos una variable 
 * llamada $valor, escribe en la sección de 
 * discusiones ¿Cómo sería un condicional 
 * para las siguientes opciones?
 * 
 * $valor es mayor que 5 pero menor que 10
 * $valor es mayor o igual a 0 pero menor o igual a 20
 * $valor es igual a “10” asegurando que el 
 * tipo de dato sea cadena
 * $valor es mayor a 0 pero menor a 5 o es 
 * mayor a 10 pero menor a 15
 */

$valor = 7;

if ($valor > 5 && $valor < 10) {
    echo "$valor es mayor que 5 pero menor que 10<br>";
}

if ($valor >= 0 && $valor <= 20) {
    echo "$valor es mayor que 0 pero menor que 20<br>";
}

if ($valor === "10") {
    echo "$valor es igual a '10'<br>";
}

if (($valor >= 0 && $valor < 5) || ($valor >= 10 && $valor < 15)) {
    echo "$valor es mayor que 0 pero menor que 5 o
    es mayor que 10 y menor que 15<br>";
}
