<?php

require_once('../../private/initialize.php');

session_start();

if (!isset($_SESSION['admin'])) {
  header("Location:signin.php");
}


$genero = trim(htmlentities(addslashes($_POST['campo_genero'])));



if (has_unique_genero_name($genero)) {
  echo '<script type="text/javascript">
              alert("El género ' . strtoupper($genero) . ' ya se encuentra en la base de datos.");
              window.location.href="generos.php";
              </script>';
} else {

  newGenero($genero);
  echo '<script type="text/javascript">
              alert("El género ' . strtoupper($genero) . ' ha sido agregado con éxito.");
              window.location.href="generos.php";
              </script>';
}
