<?php

/**
 * Retos de programación en cualquier lenguaje
 * Quinto nivel: ciclo 'for'
 */

#Reto 1 - Curso Favorito
echo "Reto #1: Curso favorito<br>";
for ($i = 0; $i < 8; $i++) {
    echo "Curso de Nodejs<br>";
}

#Reto 2 - Curso Favorito 'n' veces
echo "<br><br>Reto #2: Curso favorito 'n' veces<br>";
$numVeces = 4;
for ($i = 0; $i < $numVeces; $i++) {
    echo "Curso de Nodejs<br>";
}

#Reto 3 - Curso en una columna
echo "<br><br>Reto #2: Curso favorito 'n' veces<br>";

$cursoFavorito = 'angular';

for ($i = 0; $i < strlen($cursoFavorito); $i++) {
    echo "$cursoFavorito[$i]<br>";
}


#Reto 4 - Animal en columna 'n' veces
echo "<br><br>Reto #4: Animal en columna 'n' veces<br>";
$animalFavorito = ['leon', 'aguila', 'vaca'];

foreach ($animalFavorito as $animal) {
    for ($i = 0; $i < strlen($animal); $i++) {
        echo "$animal[$i]<br>";
    }
    echo "<br>";
}


#Reto 5 - Tabla de multiplicar
echo "<br><br>Reto #5: Tabla de multiplicar<br>";
$numero = 5;

for ($i = 1; $i <= 10; $i++) {
    echo "$numero x $i = " . ($numero * $i) . "<br>";
}


#Reto 6 - Cuenta regresiva
echo "<br><br>Reto #6: Cuenta regresiva<br>";
$valor = -5;
if ($valor >= 0) {
    for ($i = 0; $i <= $valor; $i++) {
        echo $i . "<br>";
    }
} else {
    for ($i = 0; $i <= abs($valor); $i++) {
        echo $i * (-1) . "<br>";
    }
}


#Reto 7 - Curso favorito, sin exagerar
echo "<br><br>Reto #7: Curso favorito sin exagerar<br>";
$numVeces = 16;

if ($numVeces > 15) {
    echo "$numVeces es un número muy grande<br>";
    for ($i = 0; $i < 3; $i++) {
        echo "Curso de Nodejs<br>";
    }
} else {
    for ($i = 0; $i < $numVeces; $i++) {
        echo "Curso de Nodejs<br>";
    }
}

#Reto 8 - Suma autorizada
echo "<br><br>Reto #8: Suma autorizada<br>";
$valorUno = 3;
$respuestaUno = true;
$valorDos = 4;
$respuestaDos = true;
$valorTres = 2;
$respuestaTres = false;
$valorCuatro = 1;
$respuestaCuatro = false;
$sumatoria = 0;

if ($respuestaUno) {
    $sumatoria += $valorUno;
}

if ($respuestaDos) {
    $sumatoria += $valorDos;
}

if ($respuestaTres) {
    $sumatoria += $valorTres;
}

if ($respuestaCuatro) {
    $sumatoria += $valorCuatro;
}


echo "La sumatoria da un total de $sumatoria";

#Reto 9 - Recta númerica
echo "<br><br>Reto #9: Recta númerica<br>";
$valor = 4;
// 1 = positiva, 2 = negativa
$tipoRecta = 2;

if ($tipoRecta === 1) {
    for ($i = 0; $i <= $valor; $i++) {
        echo $i . ",";
    }
} else if ($tipoRecta === 2) {
    for ($i = 0; $i <= $valor; $i++) {
        echo $i * (-1) . ",";
    }
} else {
    echo "Tipo de recta no válida";
}
