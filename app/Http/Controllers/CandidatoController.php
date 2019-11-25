<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Estado;
use App\User;

use App\Http\Requests\CandidatoStoreRequest;
use App\Http\Requests\CandidatoUpdateRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Images; //Provider para guardar las imagenes

class CandidatoController extends Controller
{
    public function index()
    {
        $candidatos = Candidato::select('id','user_id','nombre','genero','edad')->with('user')->orderBy('id','DESC')->get();
        return view('admin.candidatos.index',compact('candidatos'));
    }
    public function create()
    {
        $estados = Estado::select('id','nombre')->get();
        return view('admin.candidatos.form',compact('estados'));
    }
    public function show(Candidato $candidato)
    {
        $candidato->user;
        return view ('admin.candidatos.show',compact('candidato'));
    }
    public function edit(Candidato $candidato)
    {
        $estados = Estado::select('id','nombre')->get();
        $candidato->user;
        return view('admin.candidatos.form',compact('candidato','estados'));
    }
    public function store(CandidatoStoreRequest $request)
    {   
        $image_id = 1; //Id de la imagen por defecto

        if($request->has('image'))
           $image_id = Images::save($request->image);


        $user = User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'image_id' => $image_id
        ]);

        $candidato = new Candidato();
        $candidato->fill($request->all());
        $candidato->user_id = $user->id;
        $candidato->save();
        return redirect('/admin/candidato')->with('success', 'Candidato agregado correctamente!');
    }
    public function update(CandidatoUpdateRequest $request, Candidato $candidato)
    {
        if(User::where('id','<>',$candidato->user->id)->where('email',$request->email)->first())
            return redirect()->back()->withErrors(['La cuenta de correo ya esta siendo utilizada para otra cuenta']);

        $candidato->fill($request->all());

        $candidato->user->name = $request->nombre;
        $candidato->user->email = $request->email;

        if($request->password)
            $candidato->user->password = Hash::make($request->password);

        
        $image_id = 1; //Id de la imagen por defecto

        if($request->has('image'))
        {   
            if($candidato->user->image_id != 1)
                $image_id = $candidato->user->image_id;

           $candidato->user->image_id = Images::save($request->image);
        }


        $candidato->user->save();
        $candidato->save();

        if($image_id != 1)
            Images::delete($image_id);

        return redirect()->back()->with('success', 'Candidato modificado correctamente!');
    }
    public function destroy(Candidato $candidato)
    {

        $image_id = $candidato->user->image_id;
        $user = $candidato->user();

        foreach ($candidato->archivos as $key => $archivo)
        {
            $rutaArchivo = storage_path($archivo->hash);
            if (\Storage::exists($archivo->hash))
            {
                \Storage::delete($archivo->hash);
                $archivo->delete();
            }
        }
        

        $candidato->delete();
        $user->delete();

        if($image_id != 1) //Si la imagen no es la que viene por default entonces la eliminanos (De la base y del disco)
            Images::delete($candidato->user->image_id);


         return redirect('/admin/candidato')->with('success', 'Candidato eliminado correctamente!');
    }
}
