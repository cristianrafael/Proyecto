<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Images;

class Candidato extends Model
{
  protected $fillable = ['user_id','nombre','edad','genero','estado_id','ciudad_id','estado_civil','telefono','descripcion_personal','descripcion_profesional'];

  protected $appends = ['image'];

  public function getImageAttribute()
  {
    return Images::getUrl($this->user->image_id);
  }

  public function user()
  {
 		return $this->belongsTo('App\User');
  }

  public function archivos()
  {
    return $this->hasMany('App\Archivo');
  }
}
