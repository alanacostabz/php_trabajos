<?php

require_once('conexion.php');

$base = Conexion::Conectar();

$tamanioPaginas = 3;
$pagina = 1;

if (isset($_GET['pagina'])) {
  if ($_GET['pagina'] == 1) {
    header('Location:index.php');
  } else {
    $pagina = $_GET['pagina'];
  }
} else {
  $pagina = 1;
}

$empezarDesde = ($pagina - 1) * $tamanioPaginas;

$sqlTotal = "SELECT * FROM DATOS_USUARIOS";
$resultado = $base->prepare($sqlTotal);
$resultado->execute(array());
$numFilas = $resultado->rowCount();
$totalPaginas = ceil($numFilas / $tamanioPaginas);
