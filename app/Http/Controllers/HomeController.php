<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Vacante;
use App\Asignacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{

	public function index()
	{
		$categorias = Categoria::all();
		return view('home',compact('categorias'));
	}
    public function home()
    {
    	$this->middleware('auth');
        return view('home',compact('categorias'));
    }
    public function busqueda(Request $request)
    {
    	$vacantes = Vacante::select('*');

        $categoria = null;

    	if($request->category)
        {
            $categoria = Categoria::find($request->category);
    		$vacantes = $vacantes->whereIn('id',Asignacion::where('categoria_id',$request->category)->pluck('vacante_id'));
        }

    	if($request->palabras)
        {
            $vacantes = $vacantes->where(function($query) use ($request){
                                        $query->where('titulo','LIKE','%'.$request->palabras.'%')
                                              ->orWhere('descripcion_puesto','LIKE','%'.$request->palabras.'%');
                                    });

        }
    	$vacantes = $vacantes->orderBy('created_at','DESC')->paginate(9);
        $vacantes->load('categorias');
        $categorias = Categoria::all();

        $busqueda = ['palabras' => $request->palabras, 'categoria' => $categoria];

    	return view('vacante.index',compact('vacantes','categorias','busqueda'));
    }
}
