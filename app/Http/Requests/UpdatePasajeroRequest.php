<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasajeroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'sometimes|required|string|max:255',
            'apellido' => 'sometimes|required|string|max:255',
            'telefono' => 'sometimes|required|string|unique:pasajeros,telefono,' . $this->route('pasajero'),
            'uid' => 'sometimes|required|string|unique:pasajeros,uid,' . $this->route('pasajero'),
            'estado' => 'sometimes|required|in:activo,baneado,esperando',
            'usuario_id' => 'sometimes|required|exists:usuarios,id',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.unique' => 'El teléfono ya está registrado.',
            'uid.required' => 'El UID es obligatorio.',
            'uid.unique' => 'El UID ya está registrado.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado debe ser activo, baneado o esperando.',
            'usuario_id.required' => 'El usuario es obligatorio.',
            'usuario_id.exists' => 'El usuario no existe.',
        ];
    }
}
