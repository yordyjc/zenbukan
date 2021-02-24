<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posicion extends Model
{
    protected $table = 'posiciones';
    protected $guarded = [];

    public function inscripcion()
    {
        return $this->belongsTo('App\Models\Inscripcion','inscripcion_id');
    }
}
