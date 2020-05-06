<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function galeria()
    {
        return $this->belongsTo('App\Models\Galeria');
    }
}
