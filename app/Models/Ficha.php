<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = 'fichas';

    protected $guarded = [];

    public function usuario(){
        return $this->belongsTo('App\User','user_id');
    }

    public function periodos(){
        return $this->hasMany('App\Models\Periodo','ficha_id');
    }
}
