<?php

/**
 * Argumento: es lo que colocamos dentro de la
 * parentesis como valor
 * 
 * Referencia: apunta u observa directamente el
 * comportamiento de otro elemento
 * 
 * Predeterminado
 */

// Valores
// function greet($nombre)
// {
//     return "Hola $nombre";
// }

// echo greet('Alan');

// Referencias
$course = 'PHP';
function path(&$course)
{
    $course = 'Laravel'; // Laravel
    echo $course;
}

path($course);
echo $course; // Laravel, al usar & se afecta desde afuera

// Predeterminado
function greet($name = 'Messi')
{
    return "Hola $name";
}

echo greet();
echo greet('Alan');
