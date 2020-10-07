<?php

namespace Vehicles;

abstract class VehicleBase
{
    protected $owner;

    public function __construct($owner)
    {
        $this->owner = $owner;
    }


    public function move()
    {
        echo $this->startEngine();
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

    public abstract function startEngine();
}
