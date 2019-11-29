<?php

namespace App\Http\Controllers;

use App\Postulacion;
use App\Candidato;
use App\Vacante;

use Illuminate\Http\Request;

class PostulacionController extends Controller
{
    public function store(Candidato $candidato, Vacante $vacante)
    {
        $candidato->postulaciones()->attach($vacante->id);
        return redirect()->back()->with('success','Postulado correctamente!');
    }
    public function destroy(Candidato $candidato, Vacante $vacante)
    {
        $candidato->postulaciones()->detach($vacante->id);
        return redirect()->back()->with('success','Postulacion eliminada!');
    }
}
