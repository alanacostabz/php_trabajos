<?php

// $frontend = [
//     'frontend' => 'javascript'
// ];
// $backend = [
//     'backend' => 'php',
//     'framework' => 'laravel'
// ];

// echo '<pre>';
# se suman los dos arrays pero si tienen
# keys iguales se no se imprimen todos 
# los valores
//var_dump($frontend + $backend);

# cuando no se agregen keys diferentes se
# puede usar
$frontend = ['javascript'];
$backend = ['php', 'laravel'];

// echo '<pre>';
// var_dump(array_merge($frontend, $backend));
# en este caso solo es efectivo si las keys
# son numericas, en caso contrario gana el 
# ultimo key

# para que eso no pase se usa
//var_dump(array_merge_recursive($frontend, $backend));

# para asignar keys a un array a partir de otro
$courses = ['javascript', 'php', 'laravel'];
$categories = ['front', 'back', 'framework'];

echo '<pre>';
var_dump(array_combine($categories, $categories));
