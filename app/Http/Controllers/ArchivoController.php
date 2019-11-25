<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Candidato;

use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    public function index(Candidato $candidato)
    {   
        $candidato->archivos;
        return view('admin.archivos.index',compact('candidato'));
    }
    public function create(Candidato $candidato)
    {
        return view('admin.archivos.form',compact('candidato'));
    }
    public function store(Candidato $candidato, Request $request)
    {
        if($request->archivo->isValid())
        {
            $nombreHash = $request->archivo->store('');
            Archivo::create([
                'candidato_id' => $candidato->id,
                'original' => $request->archivo->getClientOriginalName(),
                'hash' => $nombreHash,
                'mime' => $request->archivo->getClientMimeType(),
                'tamaño' => $request->archivo->getClientSize(),
            ]);
            return redirect()->back()->with('success', 'Archivo agregado correctamente!');
        }
        return redirect()->back()->withErrors(['El archivo no es valido']);
    }
    public function destroy(Candidato $candidato, Archivo $archivo)
    {
        $rutaArchivo = storage_path($archivo->hash);

        if (\Storage::exists($archivo->hash)) {
            \Storage::delete($archivo->hash);
            $archivo->delete();
        }

        return redirect()->back();
    }
    public function download(Archivo $archivo)
    {
        $rutaArchivo = storage_path('app/' . $archivo->hash);
        return response()->download($rutaArchivo, $archivo->original, ['Content-Type' => $archivo->mime]);
    }

    
}
