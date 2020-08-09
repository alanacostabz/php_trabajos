<?php

class PersonasModel
{
  private $db;
  private $personas;

  public function __construct()
  {
    require_once('model/conexion.php');
    $this->db = Conexion::Conectar();
    $this->personas = array();
  }

  public function getPersonas()
  {
    require_once('paginacion.php');
    $consulta = $this->db->query("SELECT * FROM DATOS_USUARIOS LIMIT $empezarDesde,$tamanioPaginas");

    while ($filas = $consulta->fetch(PDO::FETCH_BOTH)) {
      $this->personas[] = $filas;
    }

    return $this->personas;
  }
}
