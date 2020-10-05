<?php

/**
 * Retos de programación 
 * para cualquier lenguaje - 
 * Segundo nivel: condicionales
 */

#Reto 1 - Número mayor y menor
echo "Reto #1: Número mayor y menor<br>";
$primerNumero = 10;
$segundoNumero = 5;

if ($primerNumero > $segundoNumero) {
    echo "$primerNumero es mayor que $segundoNumero, 
    La diferencia es " . ($primerNumero - $segundoNumero);
} else if ($primerNumero < $segundoNumero) {
    echo "$segundoNumero es mayor que $primerNumero,
    La diferencia es " . ($segundoNumero - $primerNumero);
} else {
    echo "Los números son iguales, la diferencia es 0";
}

#Reto 2 - En el rango, por favor
echo "<br><br>Reto #2: En el rango, por favor<br>";
$limite = 10;
$numero = 7;
if ($limite >= $numero) {
    echo "El número $numero se encuentra en el rango, gracias";
} else {
    echo
        "El número $numero excede el límite permitido";
}

#Reto 3 - Rangos cambiantes
echo "<br><br>Reto #3: Rangos cambiantes<br>";
$limiteSuperior = 10;
$limiteInferior = 7;
$numeroComparacion = 6;

if ($numeroComparacion <= $limiteSuperior && $numeroComparacion >= $limiteInferior) {
    echo "El número $numeroComparacion SI se encuentra en el rango entre $limiteInferior y $limiteSuperior";
} else {
    echo "El número $numeroComparacion NO se encuentra en el rango entre $limiteInferior y $limiteSuperior";
}

#Reto 4 - 'I like turtles'
echo "<br><br>Reto #4: 'I like turtles'<br>";
$animalFavorito = "TorTuga";

switch (strtolower($animalFavorito)) {
    case 'tortuga':
        echo 'También me gustan las tortugas';
        break;
    default:
        echo 'Animal no válido';
        break;
}

#Reto 5 - ¿Cómo está el clima?
echo "<br><br>Reto #5: ¿Cómo está el clima?<br>";
# ¿Está lloviendo?
$lloviendo = 'no';
# ¿Está haciendo mucho viento?
$viento = 'si';

echo "¿Está lloviendo? " . strtolower($lloviendo) . "<br>";
if (strtoupper($lloviendo) === 'SI') {
    echo "¿Está haciendo viento? " . strtolower($viento) . "<br>";
    if (strtoupper($viento) === 'SI') {
        echo "Hace mucho viento para salir con una sombrilla<br>";
    } else {
        echo "Por favor utilice una sombrilla";
    }
} else {
    echo "Que pase un buen día";
}


#Reto 6 - Edad permitida
echo "<br><br>Reto #6: Edad permitida<br>";
$edad = 25;

if ($edad > 30) {
    echo "Nunca es tarde para aprender ¿Qué curso tomaremos?";
} elseif ($edad > 17 && $edad < 30) {
    echo "Es un momento excelente para impulsar tu carrera.";
} else {
    echo "¿Sabes hacia dónde dirigir tu futuro? Seguro puedo ayudarte.";
}

#Reto 7 - Mensajes opcionales
echo "<br><br>Reto #7: Mensajes opcionales<br>";
$numero = 2;

switch ($numero) {
    case 1:
        echo "Hoy aprenderemos sobre prorgamación";
        break;
    case 2:
        echo "¿Qué tal tomar un curso de marketing digital?";
        break;
    case 3:
        echo "Hoy es un gran día para comenzar a aprender de diseño";
        break;
    case 4:
        echo "¿Y si aprendemos algo de negocios online?";
        break;
    case 5:
        echo "“Veamos un par de clases sobre producción audiovisual”";
        break;
    case 6:
        echo "“Tal vez sea bueno desarrollar una habilidad blanda en Platzi”";
        break;

    default:
        echo "Por favor, ingrese un rango entre el 1 y 6";
        break;
}
