<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_business extends Model
{
    public $timestamps = false;
    protected $table = 'business';
    protected $primarykey = 'id';
    protected $fillable = [
        'empresa',
        'logo',
        'direccion',
        'rfc_e',
        'status'

    ];
    public function users(){
        return $this->hasMany('App\User');
    }
}
