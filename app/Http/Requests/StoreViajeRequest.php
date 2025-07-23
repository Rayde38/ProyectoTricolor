<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreViajeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'chofer_id' => 'required|exists:choferes,id',
            'turno_id' => 'required|exists:turnos,id',
            'tramo' => 'required|string|max:255',
            'estado' => 'required|in:pendiente,en_curso,finalizado,cancelado',
            'inicio' => 'nullable|date',
            'fin' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'chofer_id.required' => 'El chofer es obligatorio.',
            'chofer_id.exists' => 'El chofer no existe.',
            'turno_id.required' => 'El turno es obligatorio.',
            'turno_id.exists' => 'El turno no existe.',
            'tramo.required' => 'El tramo es obligatorio.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado debe ser pendiente, en_curso, finalizado o cancelado.',
            'inicio.date' => 'La fecha de inicio debe ser válida.',
            'fin.date' => 'La fecha de fin debe ser válida.',
        ];
    }
}
