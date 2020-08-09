<?php

require_once('../../private/initialize.php');

session_start();

if (!isset($_SESSION['admin'])) {
  header("Location:signin.php");
}


$productora = trim(htmlentities(addslashes($_POST['campo_productora'])));

$id = $_POST['id'];


if (has_unique_productora_name($productora)) {
  echo '<script type="text/javascript">
              alert("La productora ' . strtoupper($productora) . ' ya se encuentra en la base de datos.");
              window.location.href="editar_productora?id= ' . $id . '";
              </script>';
} else {

  updateProductora($id, $productora);
  echo '<script type="text/javascript">
              alert("La productora ' . strtoupper($productora) . ' ha sido agregada con éxito.");
              window.location.href="productoras.php";
              </script>';
}
