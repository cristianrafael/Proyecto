<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Estado;
use App\User;
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

        /*if($request->password)
            $candidato->user->password = Hash::make($request->password);*/

        
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

    }
    public function postulations()
    {

    }
}
