<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_compras extends Model
{

    public function User()
    {
        return $this->belongsTo(User::class);
    }


    public $timestamps = false;
    protected $table = 'compras';
    protected $primarykey = 'id';
    protected $fillable = [
        'producto',
        'precio',
        'cantidadcompra',
        'total',
        'usuario_id',
        'status'
    ];
}
