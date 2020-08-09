<?php require_once('../../private/initialize.php'); ?>
<?php

$id = $_GET['id'];

if (!isset($id) || $id == '') {

  echo '<script type="text/javascript">
    window.location.href = "funciones.php";
</script>';
}



$funciones_set = searchFunctionByID($id);
$funcion = mysqli_fetch_assoc($funciones_set);

if (empty($funcion)) {
  echo '<script type="text/javascript">
    alert("El id proporcionado no se encuentra en la base de datos.");
    window.location.href = "funciones.php";
</script>';
} else {
  deleteFunctionByID($id);
  echo '<script type="text/javascript">
    alert("La funcion ha sido eliminada.");
    window.location.href="funciones.php";
</script>';
}

?>

