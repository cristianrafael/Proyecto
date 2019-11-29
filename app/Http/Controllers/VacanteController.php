<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Candidato;
use App\Categoria;
use Illuminate\Http\Request;

class VacanteController extends Controller
{

    public function index()
    {
        $vacantes = Vacante::all();
        return view('admin.vacante.index',compact('vacantes'));
    }

    public function create()
    {
        return view('admin.vacante.form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'sueldo' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'descripcion_puesto' => 'required|string|max:4294967295',
            'no_vacantes' => 'required|integer|min:1',
            'horario' => 'required|string|max:255',
            'experiencia' => 'required|string|max:255'
        ]);

        $vacante = new Vacante();

        $vacante->dis_viajar = $request->dis_viajar ? 1 : 0;
        $vacante->dis_reubicarse = $request->dis_reubicarse ? 1 : 0;

        $vacante->fill($request->all());
        $vacante->save();

        return redirect('/admin/vacante')->with('success','Vacante agregada correctamente!');
    }

    public function show(Vacante $vacante)
    {
        $vacante->load('postulaciones');
        $vacante->load('categorias');
        $candidatos = Candidato::with('user')->get();
        $categorias = Categoria::all();
        return view('admin.vacante.show',compact('vacante','candidatos','categorias'));
    }

    public function edit(Vacante $vacante)
    {
        return view('admin.vacante.form',compact('vacante'));
    }

    public function update(Request $request, Vacante $vacante)
    {
        $vacante->fill($request->all());

        $vacante->dis_viajar =  $request->dis_viajar ? 1 : 0;
        $vacante->dis_reubicarse =  $request->dis_reubicarse ? 1 : 0;

        $vacante->save();
        return redirect()->back()->with('success','Vacante modificada correctamente!');
    }
    public function destroy(Vacante $vacante)
    {
        $vacante->delete();
        return redirect('/admin/vacante')->with('success','Vacante eliminada correctamente!');
    }
}
