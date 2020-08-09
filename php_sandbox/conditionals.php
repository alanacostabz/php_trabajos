<?php
# CONDITIONALS

/*
    ==
    ===
    <
    >
    <=
    >=
    !=
    !==
  */

// $num = 5;

// if ($num == 7) {
//   echo '5 passed';
// } elseif ($num == 6) {
//   echo '6 passed';
// } else {
//   echo 'did not pass';
// }


# NESTING IF
//$num = 6;

// if ($num > 4) {
//   if ($num < 10) {
//     echo "$num passed";
//   } else { echo "aggh"}
// }


/*
  LOGICAL OPERATORS
  and &&
  or ||
  xor
*/

// if ($num > 4 and $num < 10) {
//   echo "$num passed";
// }


# SWITCH
$favColor = 'purple';

switch ($favColor) {
  case 'red':
    echo 'Your favorite color is red';
    break;
  case 'blue':
    echo 'Your favorite color is blue';
    break;
  case 'green':
    echo 'Your favorite color is green';
    break;
  default:
    echo 'Your favorite color is something else';
}
