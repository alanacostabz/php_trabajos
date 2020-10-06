<?php

$courses = [
    'frontend' => 'javascript',
    'framework' => 'laravel',
    'backend' => 'php'
];

// echo "<pre>";
// var_dump($courses);

// foreach ($courses as $key => $value) {
//     echo "$key: $value<br>";
// }

// foreach ($courses as $course) {
//     echo "$course<br>";
// }

function upper($course, $key)
{
    echo strtoupper($course) . ": $key<br>";
}
array_walk($courses, 'upper');

/**
 * comprueba que existe el key en el array
 * array_key_exists('frontend',$courses);
 * 
 * busca a nivel de valores
 * in_array('javascript', $courses);
 * 
 * imprime todos los key en pantalla
 * array_keys($courses);
 * 
 * muestra todos los valores de este array
 * array_values($courses);
 */
