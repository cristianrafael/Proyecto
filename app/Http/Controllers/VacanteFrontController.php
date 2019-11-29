<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Categoria;

use Illuminate\Http\Request;

class VacanteFrontController extends Controller
{
    public function index()
    {
    	$vacantes = Vacante::orderBy('created_at','DESC')->paginate(9);
    	$vacantes->load('categorias');
    	$categorias = Categoria::all();
    	return view('vacante.index',compact('vacantes','categorias'));
    }
    public function show(Vacante $vacante)
    {
        $categorias = Categoria::all();
    	return view('vacante.show',compact('vacante','categorias'));
    }
}
