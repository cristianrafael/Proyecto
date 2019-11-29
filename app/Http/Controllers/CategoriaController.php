<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Vacante;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index',compact('categorias'));
    }

     public function create()
    {
        return view('admin.categorias.form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria = new Categoria();
        $categoria->fill($request->all());
        $categoria->save();
        return redirect('/admin/categoria')->with('success','Categoria agregada correctamente!');
    }

    public function show(Categoria $categoria)
    {
        $categoria->load('vacantes');
        $vacantes = Vacante::all();
        return view('admin.categorias.show',compact('categoria','vacantes'));
    }

    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.form',compact('categoria'));
    }

    public function update( Categoria $categoria, Request $request)
    {
        $categoria->fill($request->all());
        $categoria->save();
        return redirect()->back()->with('success','Categoria modificada correctamente!');
    }
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect('/admin/categoria')->with('success','Categoria eliminada correctamente!');
    }
}
