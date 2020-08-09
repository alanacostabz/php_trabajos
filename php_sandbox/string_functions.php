<?php
# substr()
# Returns a portion of a string

// $output = substr('Hello', 1, 3);
// $output = substr('Hello', -2);
// echo $output;

# strlen()
# Returns the length of a string

// $output = strlen('Hello World');
// echo $output;

# strpos()
# Finds the position pf the first occurence of a sub string
// $output = strpos('Hello World', 'r');
// echo $output;

# strrpos()
# Finds the position pf the first occurence of a sub string
// $output = strrpos('Hello World', 'o');
// echo $output;

# trim()
# Strips whitespace
//$text = 'Hello World          ';
// var_dump($text);

// $trimmed = trim($text);
// var_dump($trimmed);

# strtoupper
# Makes everything uppercase
// $output = strtoupper('Hello World');
// echo $output;

# strtolower
# Makes everything lowercase
// $output = strtolower('Hello World');
// echo $output;

# ucwords()
# Capitalize every word
// $output = ucwords('hello world');
// echo $output;


# str_replace()
# Replace all occurences of a search string with a replacement
// $text = 'Hello World';
// $output = str_replace('World', ' Que pex', $text);
// echo $output;

# is_string()
# Check if string
// $val = 'Hello';
// $output = is_string($val);
// echo $output;
// $values = array(true, false, null, 'ABC', 33, '33', 44.4);
// foreach ($values as $value) {
//   if (is_string($value)) {
//     echo "{$value} is a string <br>";
//   }
// }

# gzcompress()
# Compress a string

// $string = "sdfsdafasdsadf sdfsadfadfsadfas sdffdsd";
// $compressed = gzcompress($string);
// //echo $compressed;

// $original = gzuncompress(($compressed));
// echo $original;
