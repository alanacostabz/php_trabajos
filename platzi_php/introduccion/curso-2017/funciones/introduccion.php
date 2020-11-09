<?php

// function hello($name)
// {
//     echo 'hello ' . $name;
//     echo '<br>';
// }

// hello('alan');

# scope es el alcance o la vida que tiene una variable

function sum($a, $b)
{
    return $a + $b;
}

$c = sum(1, 2);
var_dump($c);
