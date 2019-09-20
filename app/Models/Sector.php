<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectores';

    protected $guarded = [];

    public function usuarios(){
        return $this->hasMany('App\User','sector_id');
    }
}
