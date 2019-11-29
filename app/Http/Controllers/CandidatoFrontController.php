<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Estado;
use App\User;
use App\Archivo;
use App\Vacante;

use Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CandidatoUpdateRequest;

class CandidatoFrontController extends Controller
{

    public function dashboard()
    {
    	return redirect('/dashboard/profile');
    }

    public function profile()
    {
    	$user = Auth::user();
    	$estados = Estado::select('id','nombre')->get();
    	$user->candidato;
        return view('candidato.profile',compact('user','estados'));
    }
    public function profileUpdate(CandidatoUpdateRequest $request)
    {
    	$user = Auth::user();
    	if(User::where('id','<>',$user->id)->where('email',$request->email)->first())
            return redirect()->back()->withErrors(['La cuenta de correo ya esta siendo utilizada para otra cuenta']);

        $user->candidato->fill($request->all());

        $user->name = $request->nombre;
        $user->email = $request->email;

        if($request->password)
            $candidato->user->password = Hash::make($request->password);

        
        $image_id = 1; //Id de la imagen por defecto

        if($request->has('image'))
        {   
            if($user->image_id != 1)
                $image_id = $user->image_id;

           $user->image_id = Images::save($request->image);
        }


        $user->save();
        $user->candidato->save();

        if($image_id != 1)
            Images::delete($image_id);

        return redirect()->back()->with('success', 'Candidato modificado correctamente!');
    }
    public function files()
    {
        $user = Auth::user();
        $user->candidato->archivos;
        return view('candidato.files',compact('user'));
    }
    public function downloadFile(Archivo $archivo)
    {
        if(Auth::user()->candidato->id != $archivo->candidato_id)
            return redirect()->back()->withErrors(['No tienes permiso para ver o descargar el archivo']);

        $rutaArchivo = storage_path('app/' . $archivo->hash);
        return response()->download($rutaArchivo, $archivo->original, ['Content-Type' => $archivo->mime]);
    }
    public function destroyFile(Archivo $archivo)
    {
        if(Auth::user()->candidato->id != $archivo->candidato_id)
            return redirect()->back()->withErrors(['No tienes permiso para ver o descargar el archivo']);

        $rutaArchivo = storage_path($archivo->hash);
        if (\Storage::exists($archivo->hash)) {
            \Storage::delete($archivo->hash);
            $archivo->delete();
        }
        return redirect()->back()->with('success','Archivo eliminado exitosamente!');
    }
    public function storeFile(Request $request)
    {
        if($request->archivo->isValid())
        {
            $nombreHash = $request->archivo->store('');
            Archivo::create([
                'candidato_id' => Auth::user()->candidato->id,
                'original' => $request->archivo->getClientOriginalName(),
                'hash' => $nombreHash,
                'mime' => $request->archivo->getClientMimeType(),
                'tamaño' => $request->archivo->getClientSize(),
            ]);
            return redirect()->back()->with('success', 'Archivo agregado correctamente!');
        }
        return redirect()->back()->withErrors(['El archivo no es valido']);
    }
    public function postulations()
    {
        $user = Auth::user();
        $user->candidato->load('postulaciones');
        return view ('candidato.postulations',compact('user'));
    }
    public function storePostulation(Vacante $vacante)
    {
        $user = Auth::user();
        $user->candidato->postulaciones()->attach($vacante->id);
        return redirect()->back()->with('success','Postulado correctamente!');
    }
    public function destroyPostulation(Vacante $vacante)
    {
        $user = Auth::user();
        $user->candidato->postulaciones()->detach($vacante->id);
        return redirect()->back()->with('success','Postulacion eliminada!');
    }
}
