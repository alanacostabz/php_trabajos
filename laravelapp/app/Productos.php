<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    // Table Name
    protected $table = 'productos';
    // Priamry Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;
}
