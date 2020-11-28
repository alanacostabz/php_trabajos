<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    // Table Name
    protected $table = 'catalogo_marcas';
    // Priamry Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;
}
