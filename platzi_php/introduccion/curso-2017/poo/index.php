<?php

/**
 * La programación orientada a objetos
 * es un paradigma de programacion que nos 
 * ayuda a generar un código más modular 
 * más reutilizable y más facil de mantener
 * 
 * Esta basada en:
 * 
 * CLASES: que lo podemos ver como alguna
 * plantilla de alguna entidad abastracta
 * por ejemplo una persona
 * 
 * ENCAPSULAMIENTO: se usa para evitar que una
 * variable sea accedida o modificada sin su
 * consentimiento
 */

// class Car
// {
//     private $owner;

//     public function __construct($owner)
//     {
//         $this->owner = $owner;
//     }

//     public function __destruct()
//     {
//         echo 'Destruct <br>';
//     }

//     public function move()
//     {
//         echo 'Moving<br>';
//     }

//     public function getOwner()
//     {
//         return $this->owner;
//     }

//     public function setOwner($owner)
//     {
//         $this->owner = $owner;
//     }
// }


include 'vehicles/Car.php';
include 'vehicles/Truck.php';
include 'vehicles/ToyCar.php';

use Vehicles\{Car, Truck, ToyCar};

try {
    echo 'Class ToyCar<br>';
    $toyCar = new ToyCar('Messi');
    $toyCar->move();
} catch (Exception $e) {
    echo 'This is a toy<br>';
} finally {
    echo 'finally<br><br>';
}


$car = new Car('Messi');
$truck = new Truck('Alan', 'pickup');

//$car->move();
//$car->owner = 'Alan';
// $car->setOwner('Messi');
// $car->setOwner('Hazard');


echo 'Class Car<br>';
$car = new Car('Messi');
$car->move();
echo '<br>Owner car: ' . $car->getOwner();
echo '<br><br>';

echo 'GPS pos:' . $car->getPos();

echo 'Class Truck 1<br>';
$truck1 = new Truck('Alan', 'Pickup');
$truck1->move();
//echo 'Owner truck: ' . $truck->getOwner();

echo 'Class Truck 2<br>';
$truck2 = new Truck('Alan', 'Pickup');
$truck2->move();

echo '<br>Total Trucks: ' . Truck::getTotal();

$ser = serialize($car);
$newCar = unserialize($ser);

echo 'NewCar: ' . $newCar->getOwner() . '<br>';

// $v1 = new \Vehicles\VehicleBase('Hazard');
// $v1->move();
