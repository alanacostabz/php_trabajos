<?php
#Array - Variable tha holds multiple values
/*
    - Indexed
    - Associative
    - Multi-dimensional
  */

// Indexed
$people = array('Alan', 'John', 'Hayley');
$ids = array(23, 55, 12);
$games = ['Smash', 'Mario Kart', 'Zelda'];
$games[3] = 'Pokemon';
$games[] = 'Metroid';

//echo count($games);
//print_r($games);
//var_dump($games);

//echo $people[2];
//echo $ids[2];
//echo $games[4];


// Associative arrays
$people = array('Alan' => 24, 'Bryan' => 16, 'Diana' => 12);
$ids = [22 => 'Ronaldo', 19 => 'Yazbeck', 26 => 'Fernanda'];
//echo $people['Alan'];
//echo $ids[26];
$people['Jill'] = 42;
//echo $people['Jill'];
//print_r($people);
//var_dump($people);

// Multi-Dimensional
$games = array(
  array('Fifa 20', 20, 17),
  array('Resident Evil 2', 25, 15),
  array('Zelda BOTW', 10, 2)
);

echo $games[1][0];
