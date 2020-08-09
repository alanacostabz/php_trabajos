<?php require_once('../../private/initialize.php'); ?>
<?php

$id = $_GET['id'];

if (!isset($id) || $id == '') {

  echo '<script type="text/javascript">
    window.location.href = "generos.php";
</script>';
}



$generos_set = searchGeneroByID($id);
$genero = mysqli_fetch_assoc($generos_set);

if (empty($genero)) {
  echo '<script type="text/javascript">
    alert("El id proporcionado no se encuentra en la base de datos.");
    window.location.href = "generos.php";
</script>';
} else {
  deleteGenero($id);
  echo '<script type="text/javascript">
    alert("El genero ' . $genero['NOMBRE'] . ' ha sido eliminado.");
    window.location.href="generos.php";
</script>';
}

?>

