<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasajeroEsperandoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pasajero_id' => 'sometimes|required|exists:pasajeros,id',
            'tramo' => 'sometimes|required|string|max:255',
            'estado' => 'sometimes|required|in:esperando,asignado,atendido,cancelado',
            'hora_espera' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'pasajero_id.required' => 'El pasajero es obligatorio.',
            'pasajero_id.exists' => 'El pasajero no existe.',
            'tramo.required' => 'El tramo es obligatorio.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado debe ser esperando, asignado, atendido o cancelado.',
            'hora_espera.date' => 'La hora de espera debe ser válida.',
        ];
    }
}
