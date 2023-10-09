<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_permissionsreports extends Model
{
    public $timestamps = false;
    protected $table = 'permissionsreports';
    protected $primarykey = 'id';
    protected $fillable = [
        'nombre',
        'motivo',
        'status'
        
    ];
}

 