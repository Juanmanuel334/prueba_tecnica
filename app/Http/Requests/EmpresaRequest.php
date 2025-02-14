<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmpresaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_empresa' => 'required|string|max:255',
            'descripcion_empresa'=> 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_empresa.required' => 'El nombre de la empresa es obligatorio',
            'descripcion_empresa.required'=> 'La descripcion de la empresa es obligatorio',
        ];
    }
}
