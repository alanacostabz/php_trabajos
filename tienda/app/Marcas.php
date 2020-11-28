<?php

namespace tienda;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    // nombre de la tabla
    protected $table = 'CATALOGO_MARCAS';

    // llave primaria
    protected $primaryKey = 'ID';

    // public $timestamps=false;

    // atributos de la base de datos
    protected $fillable = [
        'NOMBRE_MARCA'
    ];

    protected $guarded = [];
}
