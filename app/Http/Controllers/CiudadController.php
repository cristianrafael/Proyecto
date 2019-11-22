<?php

namespace App\Http\Controllers;

use App\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
	//Metodo que regresa un json con las ciudades del estado seleccionado
    public function byEstado($estado_id)
    {
    	return Ciudad::select('id','nombre','estado_id')->where('estado_id',$estado_id)->get();
    }
}
