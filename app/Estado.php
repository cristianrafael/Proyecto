<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public function ciudades()
    {
    	return $this->hasMany('App\Ciudad');
    }
    public function candidatos()
    {
    	return $this->hasMany('App\Candidato');
    }
}
