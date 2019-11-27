<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    public function estado()
    {
    	return $this->belongsTo('App\Estado');
    }
    public function candidatos()
    {
    	return $this->hasMany('App\Candidato');
    }
}
