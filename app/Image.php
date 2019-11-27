<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = array('id');

    public user()
    {
    	return $this->belongsTo('App\User');
    }
}
