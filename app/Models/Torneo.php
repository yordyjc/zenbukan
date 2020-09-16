<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    public function modalidades()
    {
        return $this->hasMany('App\Models\Modalidad','torneo_id');
    }
}
