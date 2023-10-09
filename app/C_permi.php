<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_permi extends Model
{
    public $timestamps = false;
    protected $table = 'permi';
    protected $primarykey = 'id';
    protected $fillable = [
        'nombre',
        'motivo',
        'fecha',
        'autorizacion',
        'status'
        
    ];
}
 