<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $table='modalidades';
    protected $guarded = [];
    public function inscripciones()
    {
        return $this->hasMany('App\Models\Inscripcion','modalidad_id');
    }

    public function torneo()
    {
        return $this->belongsTo('App\Models\Torneo','torneo_id');
    }
}
