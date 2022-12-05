<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PlanServicioRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:15|unique:plan',
            'descripcion' => 'required|min:10|max:99',
            'precioplan' => 'required|min:5|max:8',
            'totalservicio' => 'required|min:5|max:8',
            'totalplan' => 'required|min:5|max:8',
            'domo_id' => 'required',
        ]; 
    }

    public function attributes()
    {
        return [
            'nombre' => 'El nombre es requerido y',
            'descripcion' => 'La descripción es requerida y',
            'precioplan' => 'El precio del plan es requerido y',
            'totalservicio' => 'El precio del servicio es requerido y',
            'totalplan' => 'El precio del plan es requerido y',
        ];
    }
}
