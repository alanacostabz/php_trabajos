<?php

// Recibimos los datos de la imagen
$nombreImagen = $_FILES['imagen']['name'];
$tipoImagen = $_FILES['imagen']['type'];
$tamanioImagen = $_FILES['imagen']['size'];

//echo $tamanioImagen;

if ($tamanioImagen <= 1000000) {
  if ($tipoImagen == 'image/jpeg' || $tipoImagen == 'image/png' || $tipoImagen == 'image/gif' || $tipoImagen == 'image/png') {
    // Ruta de la carpeta destino en el servidor
    $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/uploads/';

    // Movemos la imagen del directorio temporal al directorio escogido
    move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaDestino . $nombreImagen);
  } else {
    echo 'Solo se pueden subir imagenes JPEG, PNG, GIF, JPG';
  }
} else {
  echo 'El tamaño de la imagen es demasiado grande';
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

$sql = "UPDATE PRODUCTOS SET FOTO='" . $nombreImagen . "' WHERE CÓDIGOARTÍCULO='AR01'";

$resultados = mysqli_query($conexion, $sql);
