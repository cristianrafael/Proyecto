<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Vacante;
use App\Categoria;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
    	$info = ['candidatos' => Candidato::count(),
    		     'vacantes' => Vacante::count(),
    		 	 'categorias' => Categoria::count()
    		 	];
    	return view('admin.home',compact('info'));
    }
}
