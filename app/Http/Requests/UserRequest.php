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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' =>'min:3|max:15',
            'lastName' =>'min:3|max:20',
            'document' =>'unique:users|min:7|max:16',
            'phone' => 'min:7|max:10',
            'address' => 'min:7|max:20',
            'email' => 'max:40|unique:users',
            'password' => '',
            'status' => '','integer',
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
