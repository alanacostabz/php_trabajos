<?php
require('conexion.php');

class DevuelveProductos extends Conexion
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_productos($dato)
  {
    $sql = "SELECT * FROM PRODUCTOS WHERE PAÍSDEORIGEN = '" . $dato . "'";
    $sentencia = $this->conexion_db->prepare($sql);

    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_BOTH);
    $sentencia->closeCursor();
    return $resultado;
    $this->conexion_db = null;

    //========================================================================
    // $resultado = $this->conexion_db->query('SELECT * FROM PRODUCTOS WHERE PAÍSDEORIGEN ="' . $dato . '"');
    // $productos = $resultado->fetch_all(MYSQLI_BOTH);
    // return $productos;
  }
}
