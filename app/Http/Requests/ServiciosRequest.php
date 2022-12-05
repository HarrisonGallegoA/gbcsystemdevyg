<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiciosRequest extends FormRequest
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
            'nombre'=>'unique:servicios|min:5|max:20',
            'descripcion'=>'min:10|max:99',
            'precio'=>'min:5|max:8',
            'tiempo'=>'',
            'estado'=>'',
        ]; 
    }

    public function attributes()
    {
        return [
            'nombre'=>'El nombre es requerido y',
            'descripcion'=>'La descripción es requerida y',
            'precio'=>'El precio es requerido y',
            'tiempo'=>'El tiempo es requerido y',
            'estado'=>'required',
        ];
    }
}
