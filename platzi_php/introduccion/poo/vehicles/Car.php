<?php

namespace Vehicles;

require_once 'VehicleBase.php';

class Car extends VehicleBase implements \Serializable
{
    public function move()
    {
        echo $this->startEngine() . '<br>';
        echo 'Car: moving<br>';
    }

    public function startEngine()
    {
        return 'Car: start engine<br>';
    }

    public function serialize()
    {
        echo 'Serialize<br>';
        return $this->owner;
    }

    public function unserialize($serialized)
    {
        echo 'Unserialize<br>';
        $this->owner = $serialized;
    }
}

/**
 * PHP contiene unos métodos que le llamamos
 * serializacion y deserialziacion los cuales
 * permiten convertir un objeto en una especie
 * de bloque que puede ser como almacenado y 
 * depues con otro método se puede hacer la
 * operación inversa 
 */
