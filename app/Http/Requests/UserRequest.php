<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:15',
            'lastName' => 'required|min:3|max:20',
            'document' => 'required|min:7|max:16',
            'phone' => 'required|min:7|max:10',
            'email' => 'required|email|unique:users|max:20',
            'password' => 'required',
            'status'=> 'required: min:6|max:8'
        ]; 
    }

    public function attributes()
    {
        return [
            'nombre' => 'El nombre es requerido y',
            'lastName' => 'El apellido es requerido y',
            'document' => 'El documento es requerido y',
            'phone' => 'El telefono es requerido y',
            'email' => 'El correo debe ser unico es requerido y',
            'password'=>'la contraseña es requerida y',
            'status'=>'el estado es requerido'
        ];
    }
}
