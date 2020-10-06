
<?php
// https://www.php.net/manual/es/


//$data = 'Estudio PHP';

//echo $data[0]; // ressultado E
//echo $data{0}; // ressultado E

// $post = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, optio?';
// $extract = substr($post, 0, 20);
// echo "$extract...[Ver más]";

/**
$data = 'javascript, php, laravel'; // campo tags
$tags = explode(', ', $data); // array
echo "<pre>";
var_dump($tags);
 */

// $courses = ['javascript', 'php', 'laravel'];
// echo implode(', ', $courses);

$course = "    Curso de PHP     ";
echo '<pre>';
echo trim($course);
