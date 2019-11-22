<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
   protected $fillable = ['user_id','nombre','edad','genero','estado_id','ciudad_id'];
}
