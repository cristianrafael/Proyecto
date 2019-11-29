<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Images;

class Candidato extends Model
{
  protected $fillable = ['user_id','nombre','edad','genero','estado_id','ciudad_id','estado_civil','telefono','descripcion_personal','descripcion_profesional'];

  protected $appends = ['image'];

  public function getImageAttribute() //Accessor
  {
    return Images::getUrl($this->user->image_id);
  }
  public function setNombreAttribute($value) //Muttator
  {
    $this->attributes['nombre'] = ucwords($value);
  }
  public function user()
  {
 		return $this->belongsTo('App\User');
  }

  public function archivos()
  {
    return $this->hasMany('App\Archivo');
  }

  //Como la tabla no se llama candidato_vacante entonces establecemos la tabla que los relaciona
  public function postulaciones()
  {
    //Las llaves foraneas si estan por convencion (candidato_id y vacante_id) asi que no necesitamos definir las relaciones
    return $this->belongsToMany('App\Vacante','postulacions');
  }
}
