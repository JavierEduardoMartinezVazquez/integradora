<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_nominas extends Model
{
    public $timestamps = false;
    protected $table = 'nominas';
    protected $primarykey = 'id';
    protected $fillable = [
        'nombre',
        'status'
        
    ];
}
 