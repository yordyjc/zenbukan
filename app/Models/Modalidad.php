<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $table='modalidades';
    protected $fillable = ['torneo_id', 'nombre', 'edad_min', 'edad_max', 'grado_min', 'grado_max', 'sexo', 'kata', 'kumite'];

    protected $guarded = [];
    public function inscripciones()
    {
        return $this->hasMany('App\Models\Inscripcion','modalidad_id');
    }

    public function torneo()
    {
        return $this->belongsTo('App\Models\Torneo','torneo_id');
    }

    public function jueces()
    {
        return $this->belongsToMany('App\User');
    }
}
