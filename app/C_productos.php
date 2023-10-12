<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_productos extends Model
{
    public $timestamps = false;
    protected $table = 'productos';
    protected $primarykey = 'id';
    protected $fillable = [
        'paquete',
        'cantidad',
        'precio',
        'existencia',
        'status'
    ];
}
