<?php

namespace App\Http\Controllers;

use App\Vacante;

use Illuminate\Http\Request;

class VacanteFrontController extends Controller
{
    public function index()
    {
    	$vacantes = Vacante::orderBy('created_at','DESC')->paginate(9);
    	return view('vacante.index',compact('vacantes'));
    }
    public function show()
    {

    }
}
