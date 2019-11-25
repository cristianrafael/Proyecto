<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            //Campos para la tabla users
            'image'=> ['mimes:jpeg,bmp,png,jpg','max:2048'],
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            //Campos para la tabla candidatos
            'edad' => ['required','integer','min:18', 'max:100'],
            'genero' => ['required','string'],
            'estado_id' => ['required', 'integer','between:1,32'],
            'ciudad_id' => ['required', 'integer','between:1,2457'],

            //Campos nullable's
            'estado_civil' => ['string', 'max:255'],
            'telefono' => ['string', 'max:255'],
            'descripcion_personal' => ['string', 'max: 65534'],
            'descripcion_profesional' => ['string', 'max: 65534']
            
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'El correo electronico ya ha sido registrado',
            'image.mimes' => 'La imagen debe de ser de los formatos jpeg, bmp, png, jpg',
            'image.max' => 'La imagen no puede pesar mas de 2MB'
        ];
    }
}
