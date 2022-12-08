<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaRequest extends FormRequest
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
            'fechainicio'=>'required',
            'fechafinal'=>'required',
            'fechareserva'=>'required',
            'fechapagoparcial'=>'required',
            'pagoparcial'=>'min:5|max:8',
            'totalpagoparcial'=>'min:5|max:8',
            'totalservicio'=>'min:5|max:8',

        ];
    }

    public function attributes()
    {
        return [
            'fechainicio'=>'La fecha inicio es requerida y',
            'fechafinal'=>'La fecha final es requerida y',
            'fechareserva'=>'La fecha reserva es requerida y',
            'fechapagoparcial'=>'La fecha del pago parcial es requerida y',
            'pagoparcial'=>'El pago parcial es requerido y',
            'totalpagoparcial'=>'El total del pago  es requerido y',
            'totalservicio'=>'El total del serivicio es requerido y',
        ];
    }


}