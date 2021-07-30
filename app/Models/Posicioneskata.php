<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posicioneskata extends Model
{
    protected $table = 'posicioneskata';
    protected $guarded = [];

    public function inscripcion()
    {
        return $this->belongsTo('App\Models\Inscripcion','inscripcion_id');
    }

    public function modalidad()
    {
        return $this->belongsTo('App\Models\Modalidad','modalidad_id');
    }
    public function puntajes()
    {
        return $this->hasMany('App\Models\Calificacioneskata','posicioneskata_id');
    }

}
