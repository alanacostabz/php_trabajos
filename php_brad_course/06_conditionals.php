<?php

$age = 20;
$salary = 300000;

// // Sample if
// if ($age === 20) {
//   echo "1";
// }

// // Without circle braces
// if ($age === 20) echo "1";

// // Sample if-else
// if ($age > 20) {
//   echo "1";
// } else {
//   echo "2";
// }

// Difference between == and ===
$age == 20; // true
$age == '20'; // true

$age === 20; // true
$age === '20'; // false

// // if AND
// if ($age == 20 && $salary === 300000 ) {
//   echo "Do something";
// }

// // if OR
// if ($age == 20 || $salary === 300000 ) {
//   echo "Do something";
// }

// Ternary if
echo $age < 22 ? 'Young' : 'Old';

// Short ternary
$myAge = $age ?: 18;
echo '<pre>';
var_dump($myAge);
echo '</pre>';

// Null coalescing operator
$myName = isset($name) ? $name : 'John';
$myName = $name ?? 'John'; 
echo '<pre>';
var_dump($myName);
echo '</pre>';

// switch
$userRole = 'admin'; // editor, user, admin

switch ($userRole) {
  case 'admin':
    echo 'admin';
    break;
  case 'user':
    echo 'user';
    break;
  case 'editor':
    echo 'editor';
    break;
  
  default:
    echo 'Invalid role';
    break;
}