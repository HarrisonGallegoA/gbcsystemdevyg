<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomoCaracteristicaRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:15|unique:domo',
            'descripcion' => 'required|min:10|max:99',
            'capacidad' => 'required|min:1|max:3',
            'numerobaños' => 'required|min:1|max:3',
            'tipodomo' => 'required|min:5|max:8',
            'caracteristica_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'El nombre es requerido y',
            'descripcion' => 'La descripción es requerida y',
            'capacidad' => 'la capacidad del domo es requerida y',
            'numerobaños' => 'El numerobaños del domo es requerido y',
            'tipodomo' => 'El tipodomo es requerido y',
        ];
    }
}
