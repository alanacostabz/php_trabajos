<?php require_once('../../private/initialize.php'); ?>
<?php

$id = $_GET['id'];

if (!isset($id) || $id == '') {

  echo '<script type="text/javascript">
    window.location.href = "generos.php";
</script>';
}



$productoras_set = searchProductoraByID($id);
$productora = mysqli_fetch_assoc($productoras_set);

if (empty($productora)) {
  echo '<script type="text/javascript">
    alert("El id proporcionado no se encuentra en la base de datos.");
    window.location.href = "productoras.php";
</script>';
} else {
  deleteProductora($id);
  echo '<script type="text/javascript">
    alert("El productora ' . $productora['NOMBRE'] . ' ha sido eliminado.");
    window.location.href="productoras.php";
</script>';
}

?>

