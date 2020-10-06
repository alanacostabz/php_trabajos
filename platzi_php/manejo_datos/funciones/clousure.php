<?php

/**
 * Funcion anonima
 * Se usa en una variable que requiere lógica
 */
// $greet = function ($name) {
//     return "Hola, $name";
// };

// echo $greet('Messi');

function greet(Closure $lang, $name)
{
    return $lang($name);
}

$es = function ($name) {
    return "Hola, $name";
};

$en = function ($name) {
    return "Hello, $name";
};

echo greet($en, "Slaughter");
