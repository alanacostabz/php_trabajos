<?php

/**
 * La sintaxis es la forma correcta de escribir
 * para que nuestra computadora entienda
 */

// Asignación
$num = 9;
$lang = [
    'es' => 'español',
    'en' => 'inglés'
];

// Aritmética
echo "Suma 2+2= " . ((int)2 + (int) 2);
echo "Resta 2-2= " . ((int)2 - (int) 2);
echo "Multuplica 2*2= " . (2 * 2);
echo "Múltuplica 2*2= " . (2 * 2);
echo "Divide 2/2= " . (2 / 2);
echo "Módulo 2%2= " . (2 % 2);
echo "Exponencial 2**2= " . (2 ** 2);


// Comparación
// igual ==, valor '9' == 9
// igual ===, valor - tipo '9' === 9
// Diferencias !=, valor
// Diferencias !==, valor - tipo
// <, >, <=, >= 

// Variables
$app = 'name';
$name = 'platzi';

echo $app; // name
echo $$app; // platzi