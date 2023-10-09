<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_hourhand extends Model
{
    public $timestamps = false;
    protected $table = 'hourhand';
    protected $primarykey = 'id';
    protected $fillable = [
        'entrada',
        'salida',
        'status'
    ];
}
