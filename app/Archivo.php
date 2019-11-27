<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = ['candidato_id', 'original', 'hash', 'mime', 'tamaño'];

    public function modelo()
    {
        return $this->morphTo();
    }
    public function candidato()
    {
    	return $this->belongsTo('App\Candidato');
    }
}
