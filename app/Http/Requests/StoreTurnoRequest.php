<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTurnoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'chofer_id' => 'required|exists:choferes,id',
            'fecha' => 'required|date',
            'estado' => 'required|in:pendiente,asignado,cumplido,incumplido,cancelado',
        ];
    }

    public function messages()
    {
        return [
            'chofer_id.required' => 'El chofer es obligatorio.',
            'chofer_id.exists' => 'El chofer no existe.',
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe tener un formato válido.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado debe ser pendiente, asignado, cumplido, incumplido o cancelado.',
        ];
    }
}
