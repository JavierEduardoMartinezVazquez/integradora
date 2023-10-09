<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_vacationdays extends Model
{
    public $timestamps = false;
    protected $table = 'vacationdays';
    protected $primarykey = 'id';
    protected $fillable = [
        'inicio',
        'final',
        'disponibles',
        'status'
    ];
}
