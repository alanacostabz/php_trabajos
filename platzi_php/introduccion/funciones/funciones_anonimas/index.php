<?php

/**
 * Las FUNCIONES ANONIMAS tambien conocidas
 * como CLOSURES, son funciones que no tienen
 * un nombre especifico
 */

// $var2 = 1;

// $var = function () use ($var2) {
//     echo 'This a closure';
//     echo 'Value: ' . $var2;
// };

// $var();
$x = 3;
$numbers = [1, 2, 3, 4, 5];
$closure = function ($n) use ($x) {
    return $n * $x;
};

$x = 4;

// crear otro arreglo con la operacion
$result = array_map($closure, $numbers);

var_dump($numbers);
