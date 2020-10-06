<?php

$courses = ['javascript', 'php'];
$wishes = ['php', 'laravel', 'javascript', 'vuejs'];

echo "<pre>";

// regresa la diferencia entre los arrays
//var_dump(array_diff($wishes, $courses));

$arrayA = [1, 2, 3, 4, 5];
$arrayB = [3, 4, 5, 6, 7];
// depende del orden en que lo coloquemos
var_dump(array_diff($arrayA, $arrayB));

// array_diff_assoc()
// calcula la diferencia entre arrays con un
// chequeo adicional de indices
