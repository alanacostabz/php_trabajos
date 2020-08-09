<?php
require('config.php');

class Conexion
{
  protected $conexion_db;

  public function __construct()
  {

    try {
      $this->conexion_db = new PDO('mysql:host=localhost:3305; dbname=pruebas', 'root', '');
      $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conexion_db->exec('SET CHARACTER SET utf8');
      return $this->conexion_db;
    } catch (Exception $e) {
      echo 'La linea de error es: ' . $e->getLine();
    }

    //=================================================================================
    // $this->conexion_db = new mysqli(DB_HOST, DB_USUARIO, DB_CONTRA, DB_NOMBRE);

    // if ($this->conexion_db->connect_errno) {
    //   echo 'Fallo al conectar MySQLi: ' . $this->conexion_db->connect_errno;
    //   return;
    // }

    // $this->conexion_db->set_charset(DB_CHARSET);
  }
}
