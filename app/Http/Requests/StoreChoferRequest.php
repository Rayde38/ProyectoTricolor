<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChoferRequest extends FormRequest
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
            'telefono' => 'required|string|unique:choferes,telefono',
            'ci' => 'required|string|unique:choferes,ci',
            'estado' => 'required|in:activo,inactivo,baneado',
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
            'ci.required' => 'El CI es obligatorio.',
            'ci.unique' => 'El CI ya está registrado.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado debe ser activo, inactivo o baneado.',
            'usuario_id.required' => 'El usuario es obligatorio.',
            'usuario_id.exists' => 'El usuario no existe.',
        ];
    }
}
