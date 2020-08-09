<?php

require_once('../../private/initialize.php');

session_start();

if (!isset($_SESSION['admin'])) {
  header("Location:signin.php");
}

if (!isset($_GET['id']) || $_GET['id'] == '') {
  echo '<script type="text/javascript">
               window.location.href = "peliculas.php";
          </script>';
} else {
  $movies_set = searchMovieByID($_GET['id']);
  if (empty($movies_set)) {
    echo '<script type="text/javascript">
    alert("No se encontró pelicula que coincida con el ID proporcionado");
     window.location.href = "peliculas.php";
 </script>';
  }
}


$movie = [];
$movie['ID'] = $_GET['id'];
$movie['NOMBRE'] = trim(htmlentities(addslashes($_POST['nombre'])));
$movie['IMAGEN'] = trim(htmlentities(addslashes($_POST['imagen'])));
$movie['TRAILER'] = trim(htmlentities(addslashes($_POST['trailer'])));
$movie['DIRECCION'] = trim(htmlentities(addslashes($_POST['direccion'])));
$movie['REPARTO'] = trim(htmlentities(addslashes($_POST['reparto'])));
$movie['DURACION'] = trim(htmlentities(addslashes($_POST['duracion'])));
$movie['FECHA_ESTRENO'] = trim(htmlentities(addslashes($_POST['fechaEstreno'])));
$movie['IDIOMA'] = trim(htmlentities(addslashes($_POST['idioma'])));
$productora = trim(htmlentities(addslashes($_POST['productora'])));
$genero = trim(htmlentities(addslashes($_POST['genero'])));
$movie['SIPNOSIS'] = trim(htmlentities(addslashes($_POST['sipnosis'])));
$movie['CLASIFICACION'] = trim(htmlentities(addslashes($_POST['clasificacion'])));

$prod = mysqli_fetch_assoc(searchProductoraID($productora));
$movie['PRODUCTORA'] = $prod['ID'];
$gen = mysqli_fetch_assoc(searchGeneroID($genero));
$movie['GENERO'] = $gen['ID'];


$guardar = editMovie($movie);

echo '<script type="text/javascript">
alert("La información ha sido guardada correctamente");
 window.location.href = "peliculas.php";
</script>';
