<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_compras extends Model
{
    public $timestamps = false;
    protected $table = 'compras';
    protected $primarykey = 'id';
    protected $fillable = [
        'producto',
        'precio',
        'cantidadcompra',
        'total',
        'status'
    ];
}
