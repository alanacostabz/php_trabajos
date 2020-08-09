<?php
class Coche
{
  // private $ruedas;
  protected $ruedas;
  public $color;
  protected $motor;

  function __construct() // Método constructor
  {
    $this->ruedas = 4;
    $this->color = "";
    $this->motor = 1600;
  }

  function get_motor()
  {
    return $this->motor;
  }

  function get_ruedas()
  {
    return $this->ruedas;
  }

  function arrancar()
  {
    echo 'Estoy arrancando <br>';
  }

  function girar()
  {
    echo 'Estoy girando <br>';
  }

  function frenar()
  {
    echo 'Estoy frenando <br>';
  }

  function establece_color($color_coche, $nombre_coche)
  {
    $this->color = $color_coche;
    echo "El color de " . $nombre_coche . " es: " . $this->color . "<br>";
  }
}

// $renault = new Coche(); // Estado inicial al objeto o instancia
// $nissan = new Coche();

// // $nissan->girar();
// // echo $nissan->ruedas . ' ruedas';

// $nissan->establece_color("Rojo", "Nissan");
// $renault->establece_color("Azul", "Renault");

//-------------------------------------------------------------------------------------

class Camion extends Coche
{
  function __construct() // Método constructor
  {
    $this->ruedas = 8;
    $this->color = "";
    $this->motor = 2600;
  }

  function establece_color($color_camion, $nombre_camion)
  {
    $this->color = $color_camion;
    echo "El color de " . $nombre_camion . " es: " . $this->color . "<br>";
  }

  function arrancar()
  {
    parent::arrancar();
    echo "Camión arrancado <br>";
  }
}

  // $renault = new camion(); // Estado inicial al objeto o instancia
  // $nissan = new Coche();

  // // $nissan->girar();
  // // echo $nissan->ruedas . ' ruedas';

  // $nissan->establece_color("Rojo", "Nissan");
  // $renault->establece_color("Azul", "Renault");
