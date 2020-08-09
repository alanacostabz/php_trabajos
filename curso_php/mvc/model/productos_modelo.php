<?php

class ProductosModel
{
  private $db;
  private $productos;

  public function __construct()
  {
    require_once('model/conexion.php');
    $this->db = Conexion::Conectar();
    $this->productos = array();
  }

  public function getProductos()
  {
    $consulta = $this->db->query("SELECT * FROM PRODUCTOS");

    while ($filas = $consulta->fetch(PDO::FETCH_BOTH)) {
      $this->productos[] = $filas;
    }

    return $this->productos;
  }
}
