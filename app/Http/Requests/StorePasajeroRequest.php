<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePasajeroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|unique:pasajeros,telefono',
            'uid' => 'required|string|unique:pasajeros,uid',
            'estado' => 'required|in:activo,baneado,esperando',
            'usuario_id' => 'required|exists:usuarios,id',
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
