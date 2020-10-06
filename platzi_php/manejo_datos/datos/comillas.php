<?php

// echo "Un texto de una línea
// varias lineas";

// echo 'comilla simple \' backlash\\ continuar con mas texto <br>';

// $name = 'slaughter';
// echo "Ella es $name <br>";
// echo 'Ella es ' . $name . '<br>';

// $courses = [
//     'backend' => [
//         'PHP',
//         'Laravel'
//     ]
// ];
// echo "{$courses['backend'][0]}<br>";

// class User
// {
//     public $name = 'alan';
// }

// $user = new User;
// echo "$user->name está estudiando";

// $consolas = ['sony' => 'playstation'];
// echo "voy a comprar la consola de {$consolas['sony']}";
//echo "voy a comprar la consola de $consolas['sony']";

$player = 'messi';
$messi = 'delantero';
echo "$player es ${$player}<br>";
function getPlayer()
{
    return 'player';
}

$player = 'messi';

echo "{${getPlayer()}} es delantero";
