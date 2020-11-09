<?php

#Loops

#for
// for ($i = 0; $i < 10; $i++) {
//     echo $i . '<br>';
// }

#while
// $i = 0;
// while ($i <= 10) {
//     echo $i . '<br>';
//     $i++;
// }

#do-while
// $i = 11;
// do {
//     echo $i . '<br>';
//     $i++;
// } while ($i <= 10);

#foreach
$names = ['alan', 'fernanda', 'citlaly'];
foreach ($names as $name => $key) {
    echo $key . '-' . $name . '<br>';
}
