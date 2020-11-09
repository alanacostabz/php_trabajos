<?php

# if-else statement

$color = 'black';

// if ($color == 'black') {
//     echo 'Color is Black';
// } elseif ($color == 'white') {
//     echo 'Color is White';
// } else {
//     echo 'Color...';
// }

# switch-case statement
switch ($color) {
    case 'black':
        echo 'Color is black';
        break;
    case 'red':
        echo 'Color is red';
        break;

    default:
        echo 'Color...';
        break;
}
