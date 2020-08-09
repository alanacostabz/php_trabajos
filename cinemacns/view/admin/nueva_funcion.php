<?php

require_once('../../private/initialize.php');

session_start();

if (!isset($_SESSION['admin'])) {
  header("Location:signin.php");
}



$pelicula = trim(htmlentities(addslashes($_POST['pelicula'])));
$sala = trim(htmlentities(addslashes($_POST['sala'])));
$fechaFuncion = trim(htmlentities(addslashes($_POST['fechaFuncion'])));
$horaFuncion = trim(htmlentities(addslashes($_POST['horaFuncion'])));
$subtitulos = trim(htmlentities(addslashes($_POST['subtitulos'])));


$movie_set = searchMovieByName($pelicula);
$movie = mysqli_fetch_assoc($movie_set);


if (has_unique_function($movie['ID'], $sala, $fechaFuncion, $horaFuncion)) {
  //redirect_to(url_for('/staff/newss/new.php'));

  echo '<script type="text/javascript">
          alert("Ya existe una función de esa pelicula con los mismos datos.");
          window.location.href="formulario_funcion.php";
          </script>';
} else {
  $guardar = newFunction($movie['ID'], $sala, $fechaFuncion, $horaFuncion, $subtitulos);
  echo '<script type="text/javascript">
alert("Se ha guardado la pelicula ' . $movie['NOMBRE'] . ' correctamente.");
 window.location.href = "funciones.php";
</script>';
};
