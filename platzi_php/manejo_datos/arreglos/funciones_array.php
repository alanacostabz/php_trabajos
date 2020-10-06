<?php

$courses = [
    10 => 'php',
    100 => 'javascript',
    1000 => 'laravel'
];
# ordernar array
#sort($courses);

# ordernar array al reves
//rsort($courses);

# ordernar array por key (clave)
//ksort($courses);

# ordernar array por key (clave) al reves
krsort($courses);


echo '<pre>';
//var_dump($courses);

# se quita el elemento señalado del array
//var_dump(array_slice($courses, 1));

# agrupa arrays en pedazos
var_dump(array_chunk($courses, 1)); // 100000

// me permite eliminar el primer valor y retona un arreglo
//array_shift($courses);

// lo mismo que el anterior pero elimina el ultimo elemento
// array_pop($courses);

// agrega en el primer elemento
//array_unshift($courses);

// agrega en el ultimo elemento
// array_push($courses);

// intercambia los key y los valores
// array_flip($courses);