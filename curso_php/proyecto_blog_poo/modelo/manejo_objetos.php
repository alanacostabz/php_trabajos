<?php
include_once('objeto_blog.php');

class ManejoObjetos
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->setConexion($conexion);
  }

  public function setConexion(PDO $conexion)
  {
    $this->conexion = $conexion;
  }

  public function getContenidoPorFecha()
  {
    $matriz = array();
    $contador = 0;

    $resultado = $this->conexion->query("SELECT * FROM CONTENIDO ORDER BY FECHA DESC");

    while ($registro = $resultado->fetch(PDO::FETCH_BOTH)) {
      $blog = new ObjetoBlog();

      $blog->setID($registro["id"]);
      $blog->setTitulo($registro['titulo']);
      $blog->setFecha($registro['fecha']);
      $blog->setComentario($registro['comentario']);
      $blog->setImagen($registro['imagen']);

      $matriz[$contador] = $blog;
      $contador++;
    }

    return $matriz;
  }

  public function insertaContenido(ObjetoBlog $blog)
  {
    $sql = "INSERT INTO CONTENIDO (TITULO, FECHA, COMENTARIO, IMAGEN) VALUES ('" . $blog->getTitulo() . "','" . $blog->getFecha() . "','" . $blog->getComentario() . "','" . $blog->getImagen() . "')";
    $this->conexion->exec($sql);
  }
}
