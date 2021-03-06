<?php
$path = '/dir0/dir1/myfile.php';
$file = 'file1.txt';

// Return filename
//echo basename($path);

// Return filename without extension
//echo basename($path, '.php');

// Return the dir name from the path
//echo dirname($path);

// Check if file exists
//echo file_exists($file);

// Get abs path
//echo realpath($file);

// Checks to see if file
//echo is_file($file);

// Check if writeable
//echo is_writable($file);

// // Check if readable
// echo is_readable($file);

// Get the filesize
//echo filesize($file);

// Create a directory
//mkdir('testing');

// Remove dir if empty
//rmdir('testing');

// Copy file
//echo copy('file1.txt', 'file2.txt');

// Rename file
//rename('file2.txt', 'myfile.txt');

// Delete file
//unlink('myfile.txt');

// Write from file to string
//echo file_get_contents($file);

// Write string to file
// echo file_put_contents($file, 'Que pex morro');

// $current = file_get_contents($file);
// $current .= ' chambeando?';
// file_put_contents($file, $current);

// Open File For Reading
// $handle = fopen($file, 'r');
// $data = fread($handle, filesize($file));
// echo $data;
// fclose($handle);

// Open file for writing
$handle = fopen('file2.txt', 'w');
$txt = "John Frusiciante\n";
fwrite($handle, $txt);
$txt = "Guitarist";
fwrite($handle, $txt);
fclose($handle);
