<?php

// Alterar
//$text = "<h1>PHP es UN LENGUAJE</h1>"; // slug
$text = "PHP es UN LENGUAJE, año 2020, programación";
//echo strtolower($text); // minusculas
//echo strtoupper($text); // mayusculas
//echo ucfirst($text); // primera letra en mayusclas
//echo lcfirst($text); // primera letra en minusculas

// Reemplazar
// $slug = str_replace(' ', '-', $text);
// echo strtolower($slug);

// Modificación
$code = 39;
// para pdoer crear una factura 
// (existen str_pad_left y right dependiendo
// de la configuracion)
//echo str_pad($code, 8, '#', STR_PAD_BOTH);

// esta funcion sirve para quitar las etiquetas
// html a nuestro texto.
//echo strip_tags($text);

//echo strtoupper($text); // elemento monobyte
echo mb_strtoupper($text); // elemento multibyte
