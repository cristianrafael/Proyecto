<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria para utilizar el borrado lógico
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $fillable = ['titulo','sueldo','ubicacion','descripcion_puesto','no_vacantes','horario','experiencia'];

    
    public function postulaciones()
    {
      //Las llaves foraneas si estan por convencion (candidato_id y vacante_id) asi que no necesitamos definir las relaciones
      return $this->belongsToMany('App\Candidato','postulacions');
    }
}