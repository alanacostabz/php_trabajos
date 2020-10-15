<?php

/**
 * EJERCICIO #1
 * Escribe el código necesario para generar 
 * la cadena final usando el arreglo dado
 * 
 * Lado, ledo, lido, lodo, ludo,
 * decirlo al revés lo dudo.
 * Ludo, lodo, lido, ledo, lado,
 * ¡Qué trabajo me ha costado!
 */

$arreglo = [
    'keyStr1' => 'lado',
    0 => 'ledo',
    'keyStr2' => 'lido',
    1 => 'lodo',
    2 => 'ludo'
];

// echo $arreglo['keyStr1'] . ',' .
//     $arreglo[0] . ',' .
//     $arreglo['keyStr2'] . ',' .
//     $arreglo[1] . ',' .
//     $arreglo[2] .
//     '<br>decirlo al revés lo dudo.<br>' .
//     $arreglo[2] . ',' .
//     $arreglo[1] . ',' .
//     $arreglo['keyStr2'] . ',' .
//     $arreglo[0] . ',' .
//     $arreglo['keyStr1'] .
//     '<br>¡Qué trabajo me ha costado!<br>';

foreach ($arreglo as $palabra) {
    echo $palabra . ',';
}
echo '<br>decirlo al revés lo dudo.<br>';
// invertir array
$arreglo = array_reverse($arreglo);
foreach ($arreglo as $palabra) {
    echo $palabra . ',';
}
echo '<br>¡Qué trabajo me ha costado!<br>';

echo '<br>';
echo '<br>';

#EJERCICIO 2
/**
 * Crea un arreglo que contenga como clave 
 * los nombres de 5 países y como valor otro
 * arreglo con 3 ciudades que pertenezcan a 
 * ese país, después utiliza un ciclo foreach,
 * para imprimir el nombre del país seguido de
 * las ciudades que definiste:
 * Ejemplo,
 * México: Monterrey Querétaro Guadalajara
 * Colombia: Bogota Cartagena Medellin
 */

$paises  = [
    'México' => [
        'Ciudad de México',
        'Monterrey',
        'Sonora'
    ],
    'Estados Undos' => [
        'California',
        'Nueva York',
        'Arizona'
    ],
    'Inglarerra' => [
        'Manchester',
        'Londres',
        'Liverpool'
    ],
    'Japón' => [
        'Tokio',
        'Osaka',
        'Oita'
    ]
];

foreach ($paises as $pais => $ciudad) {
    echo $pais . ': ' . implode(" ", $ciudad) . '<br>';
}

echo '<br>';
echo '<br>';

#EJERCICIO 3
/**
 * Escribe el código necesario para encontrar 
 * los 3 números más grandes y los 3 números 
 * más bajos de la siguiente lista: 
 */

$valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];

// ordernar array de mayor a menor
rsort($valores);
echo 'Mayores:<br>';
for ($i = 0; $i < 3; $i++) {
    echo $valores[$i] . ',';
}

echo '<br>';
echo '<br>';

// ordernar valores de menor a mayor
sort($valores);
echo 'Menores:<br>';
for ($i = 0; $i < 3; $i++) {
    echo $valores[$i] . ',';
}
