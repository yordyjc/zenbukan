<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'clubes';
    protected $guarded = [];

    public function pais()
    {
        return $this->belongsTo('App\Models\Pais','pais_id');
    }

    public function competidores()
    {
        return $this->hasMany('App\User','club_id');
    }
}
