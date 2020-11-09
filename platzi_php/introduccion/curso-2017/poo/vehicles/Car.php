<?php

namespace Vehicles;

require_once 'VehicleBase.php';
require_once 'GPSTrait.php';

class Car extends VehicleBase implements \Serializable
{
    use GPSTrait;

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
 * 
 * serialize es un método usado por lo general
 * para enviar datos de tu objeto en formato
 * JSON o string para no perder su estructura.
 * 
 * unserialize lo que hace es convertir un JSON
 * o string en un objeto de PHP para poder ser
 * manupulado.
 * 
 * POLIMORFISMO es la capacidad que tiene las
 * clases con herencia, utilicen metodo(heredado)
 * de forma diferente
 */
