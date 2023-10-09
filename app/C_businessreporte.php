<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_businessreporte extends Model
{
    public $timestamps = false;
    protected $table = 'businessreporte';
    protected $primarykey = 'id';
    protected $fillable = [
        'empresa',
        'direccion',
        'numero',
        'status'
        
    ];
}
 