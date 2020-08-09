<?php
# LOOPS - Execute code set number of times

/*
    For
    While
    Do..While
    Foreach
  */

# For Loop
# @params - init, condition. inc
// for ($i = 0; $i < 10; $i++) {
//   echo 'Number ' . $i;
//   echo '<br>';
// }


#While Loop
# @params - condition
// $i = 0;
// while ($i < 10) {
//   echo $i;
//   echo '<br>';
//   $i++;
// }

# Do...While
#@params - condition
// $i = 0;
// do {
//   echo $i;
//   echo '<br>';
//   $i++;
// } while ($i < 10);


# Foreach Loop - for arrays
// $brands = array('Nintendo', 'Xbox', 'Playstation');

// foreach ($brands as $brand) {
//   echo $brand;
//   echo '<br>';
// }

$brands = array('Nintendo' => 'Switch', 'Xbox' => 'One', 'Playstation' => 'PS4');

foreach ($brands as $brand => $console) {
  echo $brand . ': ' . $console;
  echo '<br>';
}
