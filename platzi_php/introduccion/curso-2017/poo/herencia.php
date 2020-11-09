<?php

/**
 * La HERENCIA es un proceso que nos ayuda
 * a reutilizar código por medio de la herencia
 * podemos hacer que los objetos de la clase
 * obtengan las propiedades y los métodos
 * que tendrían las propiedas de la otra clase
 */

class Vehicle
{
    protected $owner;

    public function __construct($owner)
    {
        $this->owner = $owner;
    }


    public function move()
    {
        echo 'Vehicle moving<br>';
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($owner)
    {
        $this->owner = $owner;
    }
}

class Car extends Vehicle
{
    public function move()
    {
        echo 'Car moving<br>';
    }
}

class Truck extends Vehicle
{

    private $type;

    public function __construct($ownerName, $type)
    {
        $this->type = $type;
        //parent::__construct($ownerName);
        $this->owner = $ownerName;
    }

    public function move()
    {
        echo 'Truck ' . $this->type . ' moving<br>';
    }
}

echo 'Class Car<br>';
$car = new Car('Messi');
$car->move();
echo 'Owner car: ' . $car->getOwner();

echo '<br><br>';

echo 'Class Truck<br>';
$truck = new Truck('Alan', 'Pickup');
$truck->move();
echo 'Owner truck: ' . $truck->getOwner();
