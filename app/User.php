<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'password',
        'telefono',
        'sexo',
        'sector_id',
        'interes',
        'nacimiento',
        'edad',
        'enfermedad',
        'tipo',
        'foto',
        'observaciones',
        'confirmado',
        'confirmacion_token',
        'activo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sector(){
        return $this->belongsTo('App\Models\Sector','sector_id');
    }

    public function fichas(){
        return $this->hasMany('App\Models\Ficha','user_id')->with('periodos');
    }

    public function getNameAndSurnameAttribute()
    {
        return $this->nombres.' '.$this->apellidos;
    }
}
