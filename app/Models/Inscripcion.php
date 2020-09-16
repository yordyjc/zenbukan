<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';
    protected $guarded = [];

    public function modalidad()
    {
        return $this->belongsTo('App\Models\Modalidad','modalidad_id');
    }

    public function competidor()
    {
        return $this->belongsTo('App\User','competidor_id');
    }
}
