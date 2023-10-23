<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_productos extends Model
{
    public $timestamps = false;
    protected $table = 'productos';
    protected $primarykey = 'id';
    protected $fillable = [
        'producto',
        'descripcionp',
        'fotografia',
        'precio',
        'existencias',
        'status'

    ];
    public function users(){
        return $this->hasMany('App\User');
    }
}
