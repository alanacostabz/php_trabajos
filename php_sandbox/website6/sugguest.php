<?php
// GAMES Array @TODO - GET FORM DB
$game[] = 'Mario Kart 8 Deluxe';
$game[] = 'Pokemon Sword';
$game[] = 'Super Smash Bros Ultimate';
$game[] = 'Zelda: Breath Of The Wild';
$game[] = 'Zelda: Link\'s Awakening';

// Get query string
$q = $_REQUEST['q'];

$suggestion = "";

// Get suggestions
if ($q !== "") {
  $q = strtolower($q);
  $len = strlen($q);

  foreach ($game as $g) {
    if (stristr($q, substr($g, 0, $len))) {
      if ($suggestion === "") {
        $suggestion = $g;
      } else {
        $suggestion .= ", $g";
      }
    }
  }
}


echo $suggestion === "" ? "No Suggestions" : $suggestion;
