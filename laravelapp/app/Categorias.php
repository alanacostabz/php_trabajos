<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    // Table Name
    protected $table = 'catalogo_categorias';
    // Priamry Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;
}
