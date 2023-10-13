<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_ventas extends Model
{
    public $timestamps = false;
    protected $table = 'ventas';
    protected $primarykey = 'id';
    protected $fillable = [
        'producto',
        'precio',
        'total',
        'metodopago',
        'usuario',
        'tel',
        'direccion',
        'status'
    ];
}
