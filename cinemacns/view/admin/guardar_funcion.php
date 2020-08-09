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
$id_funcion = $_GET['id'];

$movie_set = searchMovieByName($pelicula);
$movie = mysqli_fetch_assoc($movie_set);


if (has_unique_function($movie['ID'], $sala, $fechaFuncion, $horaFuncion)) {
  echo '<script type="text/javascript">
              alert("La sala ' . strtoupper($sala) . ' ya se encuentra asignada a esa hora y fecha indicadas.");
              window.location.href="funciones.php";
              </script>';
} else {

  updateFunction($id_funcion, $movie['ID'], $sala, $fechaFuncion, $horaFuncion, $subtitulos);
  echo '<script type="text/javascript">
              alert("La función de la pélicula ' . strtoupper($pelicula) . ' ha sido agregado con éxito.");
              window.location.href="funciones.php";
              </script>';
}
