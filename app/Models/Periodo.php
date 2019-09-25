<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodos';

    protected $guarded = [];

    public function ficha(){
        return $this->belongsTo('App\Models\Ficha','ficha_id');
    }
}
