<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_hourhandreporte extends Model
{
    public $timestamps = false;
    protected $table = 'hourhandreporte';
    protected $primarykey = 'id';
    protected $fillable = [
        'entrada',
        'salida',
        'empresa',
        'status'
    ];
}
