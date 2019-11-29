<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Categoria;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    public function store(Categoria $categoria, Vacante $vacante)
    {
        $categoria->vacantes()->attach($vacante->id);
        return redirect()->back()->with('success','Asignacion creada correctamente!');
    }
    public function destroy(Categoria $categoria, Vacante $vacante)
    {
        $categoria->vacantes()->detach($vacante->id);
        return redirect()->back()->with('success','Asignación eliminada!');
    }
}
