<?php

require_once('../../private/initialize.php');

session_start();

if (!isset($_SESSION['admin'])) {
  header("Location:signin.php");
}


$productora = trim(htmlentities(addslashes($_POST['campo_productora'])));



if (has_unique_productora_name($productora)) {
  echo '<script type="text/javascript">
              alert("El género ' . strtoupper($productora) . ' ya se encuentra en la base de datos.");
              window.location.href="productoras.php";
              </script>';
} else {

  newPoductora($productora);
  echo '<script type="text/javascript">
              alert("El género ' . strtoupper($productora) . ' ha sido agregado con éxito.");
              window.location.href="productoras.php";
              </script>';
}
