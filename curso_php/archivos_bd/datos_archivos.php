<?php

// Recibimos los datos de la imagen
$nombreArchivo = $_FILES['archivo']['name'];
$tipoArchivo = $_FILES['archivo']['type'];
$tamanioArchivo = $_FILES['archivo']['size'];

//echo $tamanioImagen;

if ($tamanioArchivo <= 1000000) {

  // Ruta de la carpeta destino en el servidor
  $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/uploads/';

  // Movemos la imagen del directorio temporal al directorio escogido
  move_uploaded_file($_FILES['archivo']['tmp_name'], $carpetaDestino . $nombreArchivo);
} else {
  echo 'El tamaño del archivo es demasiado grande';
}

// Conexion a base de datos 
require('datos_conexion.php');

$conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

if (mysqli_connect_errno()) {
  echo 'Fallo al conectar con la BBDD';
  exit();
}

mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");


mysqli_set_charset($conexion, "utf8");

$archivoObjetivo = fopen($carpetaDestino . $nombreArchivo, "r");

$contenido = fread($archivoObjetivo, $tamanioArchivo);

$contenido = addslashes($contenido);

fclose($archivoObjetivo);

$sql = "INSERT INTO archivos (nombre, tipo, contenido) VALUES ('$nombreArchivo','$tipoArchivo','$contenido')";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_affected_rows($conexion) > 0) {
  echo 'Se ha insertado el registro con éxito';
} else {
  echo 'No se ha podido insertar el registro';
}
