<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
   	protected $fillable = ['nombre'];

   	public function vacantes()
   	{
   		return $this->belongsToMany('App\Vacante','asignacions');
   	}
}
