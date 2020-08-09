<?php require_once('../../private/initialize.php'); ?>
<?php

$id = $_GET['id'];

if (!isset($id) || $id == '') {

  echo '<script type="text/javascript">
    window.location.href = "peliculas.php";
</script>';
}



$movies_set = searchMovieByID($id);
$movie = mysqli_fetch_assoc($movies_set);

if (empty($movie)) {
  echo '<script type="text/javascript">
    alert("El id proporcionado no se encuentra en la base de datos.");
    window.location.href = "peliculas.php";
</script>';
} else {
  deleteMovie($id);
  deleteFunction($id);
  echo '<script type="text/javascript">
    alert("La pélicula ' . $movie['NOMBRE'] . ' ha sido eliminada.");
    window.location.href="peliculas.php";
</script>';
}

?>

