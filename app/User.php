<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        /*'name', 'email', 'password',*/
        'name',
        'lastname_p',
        'lastname_m',
        'email',
        'password',
        'nss',
        'tel',
        'curp',
        'rfc',
        'empresa_id',
        'puesto',
        'ingreso',
        'horariolv_id',
        'horariosab_id',
        'diasvacaciones',
        'rol',
        'foto',
        'status'
    ];
    public function empresa_id(){
        return $this->belongsTo('App\C_business');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
     ];
}
