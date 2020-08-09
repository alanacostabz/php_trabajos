<?php

require_once('../../private/initialize.php');

session_start();

if (!isset($_SESSION['admin'])) {
  header("Location:signin.php");
}



$movie = [];
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


if (has_unique_movie_title_name($movie['NOMBRE'])) {
  //redirect_to(url_for('/staff/newss/new.php'));

  echo '<script type="text/javascript">
          alert("El título de la noticia ya existe.");
          window.location.href="formulario_peliculas.php";
          </script>';
} else {
  $guardar = newMovie($movie);
  echo '<script type="text/javascript">
alert("Se ha guardado la pelicula ' . $movie['NOMBRE'] . ' correctamente.");
 window.location.href = "peliculas.php";
</script>';
};
